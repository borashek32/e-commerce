@extends('frontend.user.layouts.user')

@section('title', 'Dashboard')

@section('content')
    <p style="font-size: 14px; color: grey">
        User information
    </p>

    <div class="row">
        <div class="col-md-6">
            <h4>Billing Address</h4>

            <p>Country: {{ $user->country }}</p>
            <p>Postcode: {{ $user->postcode }}</p>
            <p>State: {{ $user->state }}</p>
            <p>City: {{ $user->city }}</p>
            <p>Address: {{ $user->address }}</p>
        </div>

        <div class="col-md-6">
            <h4>Shipping Address</h4>

            <p>Country: {{ $user->scountry }}</p>
            <p>Postcode: {{ $user->spostcode }}</p>
            <p>State: {{ $user->sstate }}</p>
            <p>City: {{ $user->scity }}</p>
            <p>Address: {{ $user->saddress }}</p>
        </div>
    </div>
@endsection
