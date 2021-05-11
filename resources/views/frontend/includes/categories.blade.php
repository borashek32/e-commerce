@foreach($banners as $banner)
    <img width="250px" style="margin-top: 20px" src="{{ $banner->photo }}" alt="{{ $banner->slug  }}">
@endforeach
<h1 class="my-4">Categories</h1>
<div class="list-group">
    @foreach($categories as $category)
        <a class="list-group-item" href="{{ route('category', $category->slug) }}">
            {{ $category->title }}
        </a>
    @endforeach
</div>

<a href="{{ route('categories') }}" style="margin-left: 20px; margin-top: 20px">
    All Categpries
</a><br>

<a href="{{ route('new-products') }}" style="margin-left: 20px; margin-top: 20px">
    New Products
</a>
