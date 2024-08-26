<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();
        $bookings = Booking::all();

        // Pass both users and bookings to the view
        return view('users.index', compact('users', 'bookings', 'search'));
    }

    public function create()
    { $bookings = Booking::all();
        $users = User::where('role', 'lessor')
        ->where('status', 'pending')
        ->get();
        return view('users.create',compact('bookings','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:lessor,renter,admin',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('frontend.admin.users_create')->with('success', 'User created successfully.');
    }

    public function uStatus()
    {
        $bookings =Booking::all();
        $users = User::where('role', 'lessor')->get();


        return view('frontend.admin.users_create', compact('users','bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists and has the role 'lessor'
        if (!$user || $user->role !== 'lessor') {
            return redirect()->back()->with('error', 'User not found or unauthorized.');
        }

        // Log the status update attempt
        Log::info('Updating user status', ['id' => $id, 'status' => $request->input('status')]);

        // Update the status
        $user->status = $request->input('status');

        // Attempt to save the user and check if it was successful
        if ($user->save()) {
            return redirect()->back()->with('success', 'User status updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update user status.');
        }
    }


    public function show(User $user)
    {
        return view('frontend.admin.users.create', compact('user'));
    }

    public function edit(User $user)
    {$bookings = Booking::all();
        $users = User::where('role', 'lessor')
        ->where('status', 'pending')
        ->get();
        return view('users.edit', compact('user','bookings','users'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'role' => 'required|in:lessor,renter,admin',
        'profile_picture' => 'nullable|image|max:2048',
    ]);

    // Update user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }
    $user->role = $request->input('role');

    if ($request->hasFile('profile_picture')) {
        // Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store the new profile picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

    public function destroy(User $user)
    {Auth::logout();
         $user->delete();
        return redirect('/login_register')->with('success', 'User deleted successfully.');
    }
    public function profile()
    {
    $users = User::where('role', 'lessor')
    ->where('status', 'pending')
    ->get();
 $bookings = Booking::all();
    $user = Auth::user();

    return view('users.profile', compact('user','bookings','users'));
}
}
