


@extends('layouts.dash')



@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">@if(Auth::check())
                Welcome, {{ Auth::user()->name }}!
            @else
                Welcome, Guest!
            @endif</h3>

            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">


              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Total Price Details</p>
                {{-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> --}}
                <div class="d-flex flex-wrap mb-5">
                  <div class="mr-5 mt-3">
                    <p class="text-muted">Total Accepted Booking Price</p>
                    <h3 class="text-primary fs-30 font-weight-medium">{{ number_format($totalBookingPrice, 0) }}$</h3>
                  </div>
                  <div class="mr-5 mt-3">
                    <p class="text-muted">Total Accepted Booking Price (Today)</p>
                    <h3 class="text-primary fs-30 font-weight-medium">{{ number_format($totalBookingPriceToday, 0) }}$</h3>
                  </div>


                </div>
                {{-- <canvas id="order-chart"></canvas> --}}
              </div>
            </div>
          </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Today’s Accepted Bookings</p>
                        <p class="fs-30 mb-2">{{ $acceptedTotal }}</p> <!-- Display the accepted bookings count -->

                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Bookings</p>
                  <p class="fs-30 mb-2">{{ $acceptedTotalLongTime }}</p>
<p></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Number of Tenants</p>
                  <p class="fs-30 mb-2">{{ $adminCount }}</p>

                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Number of Clients</p>
                  <p class="fs-30 mb-2">{{ $renterCount }}</p>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reviews Table</h4>
            <p class="card-description">
                Here are the reviews for your properties.
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Property ID</th>
                            <th>title</th>
                            <th>Reviewer Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->property_id }}</td>
                                <td>{{ $review->property->title }}</td>
                                <td>{{ $review->renter->name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->comment }}</td>
                                <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                <td><form action="{{ route('delete' ,$review->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md"> delete</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


     </div>


    <!-- content-wrapper ends -->
@endsection
