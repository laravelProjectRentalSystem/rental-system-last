<?php

namespace App\Http\Controllers;

use App\Models\bookingApi;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllBooking = Booking::all();
        if($getAllBooking) {
            return response()->json([
                'Bookings'=>$getAllBooking
            ]);
        }else{
            return response()->json([
                'message' => 'no booking found',

            ] );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bookingApiController $bookingApiController)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bookingApiController $bookingApiController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bookingApiController $bookingApiController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookingApiController $bookingApiController)
    {
        //
    }
}
