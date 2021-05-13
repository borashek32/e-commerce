@extends('frontend.layouts.clean')

@section('title', 'All Categories')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">
            All Categories:
        </h2>
    </div>

    <div class="row">
        @forelse($categories as $category)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xl-3 mb-4">
                <div class="card h-100">
                    <a href="{{ route('category', $category->slug) }}">
                        <img class="card-img-top" src="{{ $category->photo }}" alt="{{ $category->title }}" />
                    </a>

                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('category', $category->slug) }}">
                                {{ $category->title }}
                            </a>

                            <span class="badge bg-light rounded-pill">
                                {{ $category->products->count() }}
                            </span>
                        </h4>

                        <a href="{{ route('category', $category->slug) }}">
                            View category >>>
                        </a>
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

    <div style="display: flex;justify-content: center">
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
