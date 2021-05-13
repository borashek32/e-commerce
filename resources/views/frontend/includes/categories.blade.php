@foreach($banners as $banner)
    <img width="250px" style="margin-top: 20px" src="{{ $banner->photo }}" alt="{{ $banner->slug  }}">
@endforeach
<h1 class="my-4">
    Categories
</h1>

<div class="list-group">
    @foreach($categories as $category)
        <a class="list-group-item" href="{{ route('category', $category->slug) }}">
            {{ $category->title }}

            <span class="badge bg-light rounded-pill">
                {{ $category->products->count() }}
            </span>
        </a>
    @endforeach
</div>

<div style="margin-top: 20px">
    <div class="list-group">
        <a href="{{ route('categories') }}" class="list-group-item">
            All Categories
        </a>

        <a href="{{ route('new-products') }}" class="list-group-item">
            New Products
        </a>

        <a href="{{ route('products') }}" class="list-group-item">
            All Products
        </a>
    </div>
</div>
