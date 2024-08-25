<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class BookingController extends Controller
{

    public function showDashboard()
    {
        // Calculate the total number of accepted bookings
        $acceptedTotal = Booking::where('status', 'accepted')
                                ->whereDate('updated_at', Carbon::today())
                                ->count();
                                $acceptedTotalLongTime = Booking::where('status', 'accepted')
                                ->count();
                                $adminCount = User::where('role', 'lessor')->count();
                                $renterCount = User::where('role', 'renter')->count();
                                $totalBookingPrice = Booking::where('status', 'accepted')
                                ->sum('total_price');
                                $totalBookingPriceToday = Booking::where('status', 'accepted')
                                                 ->whereDate('updated_at', Carbon::today())
                                                 ->sum('total_price');
        return view('frontend.admin.dashboard', ['acceptedTotal' => $acceptedTotal,
        'acceptedTotalLongTime'=>$acceptedTotalLongTime,
        'adminCount'=> $adminCount,
        'renterCount'=>$renterCount,
        'totalBookingPrice'=>$totalBookingPrice,
        'totalBookingPriceToday'=>$totalBookingPriceToday
    ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['property', 'renter'])->get(); // Eager load relationships
        return view('bookings', ['action' => null, 'bookings' => $bookings]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = Property::findOrFail(request('property_id')); // Fetch the property by ID from the request

        return view('bookings.create', [
            'action' => 'create',
            'property' => $property,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'total_price' => 'required|numeric|min:0',
    ]);

    if (!auth()->check()) {
        return redirect()->route('viewProperty', $request->property_id)
                         ->with('loginError', 'You need to create an account or log in to book.');
    }

    // Check if the property is already booked during the requested dates with status 'accepted'
    $overlappingBooking = Booking::where('property_id', $request->property_id)
        ->where('status', 'accepted')
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                  ->orWhere(function ($query) use ($request) {
                      $query->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                  });
        })
        ->exists();

    if ($overlappingBooking) {
        return redirect()->route('viewProperty', $request->property_id)
                         ->with('bookingError', 'The property is already booked for the selected dates.');
    }

    $bookingData = $request->all();
    $bookingData['renter_id'] = auth()->id();

    // Create the booking
    $booking = Booking::create($bookingData);

    // Update property availability (if applicable)
    $property = Property::find($booking->property_id);
    if ($property) {
        $property->updateAvailability();
    }

    return redirect()->route('viewProperty', $request->property_id)
                     ->with('successBook', 'Booking created successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings', ['action' => 'show', 'booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $properties = Property::all();
        return view('bookings', [
            'action' => 'edit',
            'booking' => $booking,
            'properties' => $properties
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,accepted,rejected,canceled',
        ]);

        // Add renter_id from the authenticated user
        $bookingData = $request->all();
        $bookingData['renter_id'] = auth()->id();



        // Update the booking with the new data
        $booking->update($bookingData);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
{
    $booking->delete();

    return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
}

}
