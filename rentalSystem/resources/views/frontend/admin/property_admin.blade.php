@extends('layouts.dashB')

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
                    <h4 class="card-title">Add New Property</h4>
                    <p class="card-description">All fields are required</p>
                    <form class="forms-sample" action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($property))
                            @method('PUT')
                        @endif

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title', $property->title ?? '') }}" required>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description', $property->description ?? '') }}</textarea>
                        </div>

                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address', $property->address ?? '') }}" required>
                        </div>

                        <!-- Location Field -->
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location', $property->location ?? '') }}" required>
                        </div>

                        <!-- Price per Day Field -->
                        <div class="form-group">
                            <label for="price_per_day">Price per Day</label>
                            <input type="number" step="0.01" class="form-control" name="price_per_day" id="price_per_day" placeholder="Price per Day" value="{{ old('price_per_day', $property->price_per_day ?? '') }}" required>
                        </div>

                        <!-- Availability Field -->
                        <div class="form-group">
                            <label for="number_of_rooms">Number of Rooms</label>
                            <input type="number" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Number of Rooms" value="{{ old('number_of_rooms', $property->number_of_rooms ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="number_of_bathrooms">Number of Bathrooms</label>
                            <input type="number" class="form-control" name="number_of_bathrooms" id="number_of_bathrooms" placeholder="Number of Bathrooms" value="{{ old('number_of_bathrooms', $property->number_of_bathrooms ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="number_of_bedrooms">Number of Bedrooms</label>
                            <input type="number" class="form-control" name="number_of_bedrooms" id="number_of_bedrooms" placeholder="Number of Bedrooms" value="{{ old('number_of_bedrooms', $property->number_of_bedrooms ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="number_of_garage">Number of Garage</label>
                            <input type="number" class="form-control" name="number_of_garage" id="number_of_garage" placeholder="Number of Garage" value="{{ old('number_of_garage', $property->number_of_garage ?? '') }}">
                        </div>

                        <div class="form-group d-flex align-items-center justify-content-between ml-4 mr-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="AC" id="AC" value="1" {{ old('AC', $property->AC ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="AC">Air Conditioning</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="WIFI" id="WIFI" value="1" {{ old('WIFI', $property->WIFI ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="WIFI">WIFI</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="pool" id="pool" value="1" {{ old('pool', $property->pool ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pool">Pool</label>
                            </div>
                        </div>

                        <!-- Existing Photos Display -->
                        @if(isset($property) && $propertyPhotos->isNotEmpty())
                            <div class="form-group">
                                <label>Existing Photos</label>
                                <div class="row">
                                    @foreach($propertyPhotos as $photo)
                                        <div class="col-md-2">
                                            <img src="{{ Storage::url($photo->photo_url) }}" alt="Property Image" class="img-fluid mb-2">
                                            <!-- Option to delete or replace image -->
                                            <button class="btn btn-danger btn-sm btn-block" type="button">Delete</button>
                                            <input type="file" name="photos[{{ $photo->id }}]" class="form-control file-upload-info">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Upload New Photos -->
                        <div class="form-group">
                            <label for="photos">Upload New Photos</label>
                            <input type="file" name="photos[]" class="form-control file-upload-info" id="photos" placeholder="Upload Images" multiple>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mr-2">{{ isset($property) ? 'Update Property' : 'Create Property' }}</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
