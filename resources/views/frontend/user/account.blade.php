@extends('frontend.user.layouts.user')

@section('title', 'Information')

@section('content')
    <h4>User Information</h4>

    <form action="{{ route('account.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full name</label>
            <input type="text" class="form-control" value="{{ $user->full_name }}"
                   name="full_name" id="exampleInputEmail1" aria-describedby="fullName">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">User name</label>
            <input type="text" class="form-control" value="{{ $user->username }}" placeholder="Username"
                   name="username" id="exampleInputEmail2" aria-describedby="userName">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Phone</label>
            <input type="text" class="form-control" value="{{ $user->phone }}" placeholder="+7(777)777-77-77"
                   name="phone" id="exampleInputEmail3" aria-describedby="phone">
            <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail4" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail4" placeholder="example@example.com"
                   aria-describedby="emailHelp" value="{{ $user->email }}" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Current password</label>
            <input type="password" name="oldPassword" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">New password</label>
            <input type="password" name="newPassword" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
