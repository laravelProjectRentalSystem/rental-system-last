@extends('layouts.dash')

@section('content')
<div class="col-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create New User</h4>
            <p class="card-description">
                Fill in the details to create a new user
            </p>
            <form class="forms-sample" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleSelectRole">Role</label>
                    <select class="form-control" id="exampleSelectRole" name="role" required>
                        <option value="lessor">Lessor</option>
                        <option value="renter">Renter</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Integrated Profile Picture Upload Field -->
                <div class="form-group">
                    <label for="profilePicture">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePicture" name="profile_picture">
                    @if ($errors->has('profile_picture'))
                        <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
