<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;

// use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RenterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserDashboardController;

use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

// الصفحات الثابتة
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


Route::get('/agents', function () {
    return view('frontend.agents');
})->name('agents');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/viewProfile', function () {
    return view('frontend.profile');
})->name('viewProfile');

Route::get('/property-comparison', function () {
    return view('frontend.property-comparison');
})->name('property-comparison');


Route::get('/property-submit', function () {
    return view('frontend.property-submit');
})->name('property-submit');





// Route::get('/dashboard', function () {
//     return view('frontend.admin.dashboard');
// })->name('dashboard');




Route::get('/login_register', function () {
    return view('login_register');
})->name('login_register');


Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');


Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');




Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('check.email');






Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('check.email');







// ------------------------------------ for home----------------------------------
Route::get('/home', [PropertyController::class, 'home'])->name('home');
Route::get('/property-details/{id}', [PropertyController::class, 'property'])->name('viewProperty');
Route::get('/property', [PropertyController::class, 'AllProperty'])->name('property');
Route::post('/property', [PropertyController::class, 'AllProperty'])->name('searchProperty');
// Route::post('/property', [PropertyController::class, 'search'])->name('searchProperty');
//---------------------------------add comment------------------------------
Route::post('/property-details/{id}/review', [PropertyController::class, 'addComment'])->name('submitReview');

//Route::get('/dashboardB', function () {
//    return view('frontend.admin.dashboardB');
//})->name('dashboardB');

Route::put('/dashboardB/{id}/update-status', [PropertyController::class, 'updateBookingStatus'])->name('updateBookingStatus');

// ------------------------------------ for sillar----------------------------------

// ------------------------------------ for sillar----------------------------------


// Route for viewing a list of properties
// Property routes



Route::put('/sprofile/update', [PropertyController::class, 'supdate'])->name('sprofile.update');

Route::get('/sprofile', [PropertyController::class, 'showprof'])->name('sprofile.page')->middleware('auth');

Route::put('/users_create/{id}', [UserController::class, 'updateStatus'])->name('updateUserStatus');


Route::get('/property_admin/{property?}', [PropertyController::class, 'manage'])->name('properties.manage');

Route::put('/property_index/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/property_admin/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
Route::delete('/reviews/{id}', [BookingController::class, 'deleteReview'])->name('delete');

// Route::get('/view_property', function () {
//     return view('frontend.admin.property_create');
// })->name('property_admin');

// Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');















Route::group(['middleware' => ['role:renter']], function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', function () {
        return view('frontend.admin.dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('/profileAdmin', [UserController::class, 'profile'])->name('profile.profileAdmin');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');
    Route::get('/dashboard', [BookingController::class, 'showDashboard'])->name('dashboard');
    Route::get('/admin/bookings', [PropertyController::class, 'indexBookingAdmin'])->name('admin.bookings');
    Route::get('/users_create', [UserController::class, 'uStatus'])->name('u.create');
    Route::get('/create_property', [PropertyController::class, 'indexx'])->name('property.create');
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['role:lessor']], function () {
    Route::get('/dashboardB', [PropertyController::class, 'indexbooking'])->name('dashboardB');
    Route::post('/property_admin', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/property_index', [PropertyController::class, 'index'])->name('property.index');
    Route::get('/sprofile', [PropertyController::class, 'showprof'])->name('sprofile.page')->middleware('auth');
    Route::get('/sreview', [PropertyController::class, 'showReviews'])->name('sreview');
});












Route::post('/Logout', [UserController::class, 'destroy'])->name('destroy');
Route::get('/view_property', function () {
    return view('frontend.admin.property_create');
})->name('property_admin');


// Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/bookings/store/{id}', [BookingController::class, 'store'])->name('bookings.store');

Route::resource('bookings', BookingController::class);




// ProfileController





Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

Route::delete('/properties/delete/{id}', [PropertyController::class, 'removeProperty'])->name('properties.removeProperty');


Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
