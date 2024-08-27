<?php

namespace App\Http\Controllers;

use App\Models\bookingApi;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingApiController extends Controller
{

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


    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(bookingApiController $bookingApiController)
    {

    }


    public function edit(bookingApiController $bookingApiController)
    {

    }

    public function update(Request $request, bookingApiController $bookingApiController)
    {

    }


    public function destroy(bookingApiController $bookingApiController)
    {
        
    }
}
