<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

 
    public function updateBookingStatus(Request $request,string $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');

         if ($booking->status == 'accepted') {
            Property::where('id', $booking->status)->update(['availability' => 0]);
        }
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    public function showprof()
    {

        $user = auth()->user();

        $bookings = Booking::whereHas('property', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        // Pass both $user and $bookings to the view
        return view('frontend.admin.sprofile', compact('user', 'bookings'));
    }

    public function supdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min=8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->update(['profile_picture' => $profilePicturePath]);
        }

        return redirect()->route('sprofile.page')->with('success', 'Profile updated successfully!');
    }
    public function indexx(Request $request)
    {
        $users = User::where('role', 'lessor')
        ->where('status', 'pending')
        ->get();
        $search = $request->input('search');
                // Retrieve properties filtered by title
        $properties = Property::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->get();
        $bookings = Booking::all();

        // Pass the filtered properties and bookings to the view
        return view('frontend.admin.property_create', compact('properties', 'bookings','users'));
    }
    public function indexBookingAdmin(Request $request)
{   $users = User::where('role', 'lessor')
    ->where('status', 'pending')
    ->get();
    // Get the search term from the request
    $search = $request->input('search');

    // Retrieve all bookings with eager loading for property and renter relationships
    $bookings = Booking::with(['property', 'renter'])
        ->when($search, function ($query, $search) {
            // Filter bookings by renter's name if a search term is provided
            return $query->whereHas('renter', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })
        ->get();

    // Pass the filtered bookings data and search term to the view
    return view('users.bookings', compact('bookings','search','users'));
}

    public function removeProperty($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('property.create')->with('success', 'Property deleted successfully.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{

    $search = $request->input('search');


    $properties = Property::with('bookings')
        ->where('user_id', auth()->user()->id)
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->get();


    $bookings = Booking::whereHas('property', function ($query) {
        $query->where('user_id', auth()->user()->id);
    })->get();


    return view('frontend.admin.property_index', compact('properties', 'bookings', 'search'));
}




   public function showReviews()
{
    // Fetch properties owned by the authenticated user
    $properties = Property::where('user_id', Auth::id())->pluck('id');

    // Fetch reviews where property_id matches the user's properties
    $reviews = Review::whereIn('property_id', $properties)
                     ->with('renter') // Eager load the renter relationship
                     ->get();

    // Fetch bookings related to the user's properties
    $bookings = Booking::whereHas('property', function ($query) {
        $query->where('user_id', auth()->user()->id);
    })->get();

    return view('frontend.admin.sreview', compact('reviews', 'bookings'));
}



    /**
     * Show the form for creating a new resource or editing an existing one.
     */
    public function manage(Property $property = null)
    {  $bookings = Booking::all();
        $properties = Property::all();
        return view('frontend.admin.property_admin', compact('properties', 'property','bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'number_of_rooms' => 'nullable|integer',
            'number_of_bathrooms' => 'nullable|integer',
            'number_of_bedrooms' => 'nullable|integer',
            'number_of_garage' => 'nullable|integer',
            'AC' => 'boolean',
            'WIFI' => 'boolean',
            'pool' => 'boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = Property::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'location' => $request->location,
            'price_per_day' => $request->price_per_day,
            'number_of_rooms' => $request->number_of_rooms,
            'number_of_bathrooms' => $request->number_of_bathrooms,
            'number_of_bedrooms' => $request->number_of_bedrooms,
            'number_of_garage' => $request->number_of_garage,
            'AC' => $request->has('AC'),
            'WIFI' => $request->has('WIFI'),
            'pool' => $request->has('pool'),
        ]);

        // Store the photos and save their paths in the database
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property_photos', 'public');

                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'photo_url' => $path,
                ]);
            }
        }

        return redirect()->route('property.index')->with('success', 'Property created successfully.');
    }



    public function indexbooking(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        // Retrieve bookings related to properties owned by the authenticated user, with eager loading for property and renter relationships
        $bookings = Booking::with(['property', 'renter'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->when($search, function ($query, $search) {
                // Filter by property title or renter's name
                $query->whereHas('property', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                })
                ->orWhereHas('renter', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        // Pass the filtered bookings data and search term to the view
        return view('frontend.admin.dashboardB', compact('bookings', 'search'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'address' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'price_per_day' => 'required|numeric',
        'availability' => 'boolean',
        'number_of_rooms' => 'nullable|integer',
        'number_of_bathrooms' => 'nullable|integer',
        'number_of_bedrooms' => 'nullable|integer',
        'number_of_garage' => 'nullable|integer',
        'AC' => 'boolean',
        'WIFI' => 'boolean',
        'pool' => 'boolean',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $property->update($request->only([
        'title',
        'description',
        'address',
        'location',
        'price_per_day',
        'availability',
        'number_of_rooms',
        'number_of_bathrooms',
        'number_of_bedrooms',
        'number_of_garage',
        'AC',
        'WIFI',
        'pool',
    ]));

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('property_photos', 'public');
            PropertyPhoto::create([
                'property_id' => $property->id,
                'photo_url' => $path,
            ]);
        }
    }

    return redirect()->route('property.index')->with('success', 'Property updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('success', 'Property deleted successfully.');
    }


    // Fetching data for home page
    public function home()
    {
        $properties = Property::with(['user', 'amenities'])->paginate(6);
        $oneProperty = Property::with(['user', 'amenities'])->paginate(1);

        return view('frontend.home', compact('properties' ,'oneProperty' ));
    }

    // Data for one property
    public function property(string $id)
    {
        $propertPhoto  = PropertyPhoto::with('property')->where("property_id" , $id)->get();
        // dd($propertPhoto[0]->photo_url);
        $bookedDates = Booking::where('property_id', $id)
        ->where('status', 'accepted')
        ->get(['start_date', 'end_date']);

        $property = Property::with('user')->findOrFail($id);
        $countOfReview = Review::where('property_id', $id)->count();
        $reviews = Review::with('renter')->where('property_id', $id)->get();
        $ownerId = $property->user_id;

        $properties = Property::with('user')
            ->where('user_id', $ownerId)
            ->where('id', '!=', $id)
            ->paginate(3);
                    return view('frontend.property-details', compact('property', 'countOfReview', 'reviews','propertPhoto', 'bookedDates','properties'));
    }
    public function AllProperty(Request $request)
    {
        $location = $request->input('location');
        $search = $request->input('search');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $availability = $request->input('availability');
        $perPage = $request->input('per_page', 6);

        $query = Property::with(['user']);

        if ($location) {
            $query->where('location', '=', $location);
        }

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($availability !== null && $availability !== '') {
            $query->where('availability', '=', $availability);
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price_per_day', [$minPrice, $maxPrice]);
        }
        $properties = $query->get();


        return view('frontend.property', compact('properties'));
    }

    public function addComment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'renter_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        if (auth()->id()) {
            $review = new Review();
            $review->property_id = $validatedData['property_id'];
            $review->renter_id = $validatedData['renter_id'];
            $review->rating = $validatedData['rating'];
            $review->comment = $validatedData['comment'];
            $review->save();

            return redirect()->route('viewProperty', $id)->with('success', 'Review submitted successfully!');
        } else {
            return redirect()->route('viewProperty', $id)->with('commentError', 'You need to craete account or Login to add a comment.');
        }
    }

}
