@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">New in our shop:</h2>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xl-3 mb-4">
                <div class="card h-100">
                    <a href="#!">
                        <img class="card-img-top" src="{{ $product->photo }}" alt="{{ $product->title }}" />
                    </a>

                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">{{ $product->title }}</a></h4>
                        <h5>{{ $product->price }}</h5>
                        <p class="card-text">
                            {!! Str::limit($product->description) !!}
                        </p>
                        <a href="#">Details >>></a>
                    </div>

                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                </div>
            </div>
        @empty
            <p class="text-center" style="margin-left: 6px">
                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
            </p>
        @endforelse
    </div>
@endsection
