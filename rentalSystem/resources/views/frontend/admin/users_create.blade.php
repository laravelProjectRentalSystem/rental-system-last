@extends('layouts.dash')

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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table</h4>
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    @if($user->role == 'lessor')
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                <form action="{{ route('updateUserStatus', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" onchange="this.form.submit()" class="form-control">
                                                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="accepted" {{ $user->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="rejected" {{ $user->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ $user->updated_at->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
            </div>
        </div>

    </div>

@endsection
