@extends('layouts.dashb')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">
                            @if(Auth::check())
                                Welcome, {{ Auth::user()->name }}!
                            @else
                                Welcome, Guest!
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Search Form -->
                    <form action="" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <h4 class="card-title">Properties Table</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Price per Day</th>
                                    <th>Availability</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $prop)
                                    <tr>
                                        <td>{{ $prop->title }}</td>
                                        <td>{{ $prop->address }}</td>
                                        <td>{{ $prop->location }}</td>
                                        <td>${{ $prop->price_per_day }}</td>
                                        <td>
                                            @if($prop->availability)
                                                <label class="badge badge-success">Available</label>
                                            @else
                                                <label class="badge badge-danger">Not Available</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('properties.manage', $prop->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('properties.destroy', $prop->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
