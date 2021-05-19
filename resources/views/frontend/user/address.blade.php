@extends('frontend.user.layouts.user')

@section('title', 'Addresses')

@section('content')
    <h4>User addresses</h4>

    <div class="row">
        <div class="col-md-6">
            @include('frontend.user.includes.billing-address')
        </div>

        <div class="col-md-6">
            @include('frontend.user.includes.shipping-address')
        </div>
    </div>
@endsection
