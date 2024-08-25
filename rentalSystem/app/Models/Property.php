<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A property can have multiple photos
    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    // A property can have multiple amenities
    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }

    // A property can have multiple bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A property can have multiple reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function updateAvailability()
    {
        $today = Carbon::today();

        $isBooked = $this->bookings()
            ->where('status', 'accepted')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->exists();

        $this->availability = !$isBooked;
        $this->save();
    }

}
