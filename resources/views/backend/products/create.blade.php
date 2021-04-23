@extends('backend.layouts.admin')

@section('title', 'Add product')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Products({{ \App\Models\Product::count() }})
        </h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-2">Create new product</h5>

                    <p class="text-xs">
                        <span class="text-danger">*</span> - these fields are required
                    </p>

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">
                                        Title<span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="title" class="form-control @error('title') border border-danger @enderror"
                                           id="title" placeholder="Add some title of a new product" value="{{ old('title') }}">

                                    <div>
                                        @error('title')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="description">
                                        Description<span class="text-danger">*</span>
                                    </label>

                                    <div class="form-group">
                                        <textarea placeholder="Add some description about a new product" id="description"
                                             class="form-control @error('description') border border-danger @enderror" name="description">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>

                                    <div>
                                        @error('description')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="stock">
                                        Stock<span class="text-danger">*</span>
                                    </label>

                                    <input type="number" name="stock" class="form-control @error('stock') border border-danger @enderror"
                                           id="stock" placeholder="Quantity of products at the stock" value="{{ old('stock') }}">

                                    <div>
                                        @error('stock')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price">
                                        Price<span class="text-danger">*</span>
                                    </label>

                                    <input type="number" name="price" class="form-control
                                        @error('price') border border-danger @enderror" step="any"
                                        id="price" placeholder="Price" value="{{ old('price') }}">

                                    <div>
                                        @error('price')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="offer_price">
                                        Offer price<span class="text-danger">*</span>
                                    </label>

                                    <input type="number" name="offer_price" class="form-control
                                        @error('offer_price') border border-danger @enderror" step="any"
                                           id="price" placeholder="Offer price" value="{{ old('offer_price') }}">

                                    <div>
                                        @error('offer_price')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="discount">
                                        Discount
                                    </label>

                                    <input type="number" name="discount" class="form-control" step="any"
                                           id="discount" placeholder="Discount" value="{{ old('discount') }}">
                                </div>

                                <div class="form-group">
                                    <label for="photo">
                                        Photo<span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group" style="margin-bottom: 15px">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>

                                        <input id="thumbnail" class="form-control text-secondary @error('photo')
                                            border border-danger @enderror" type="text" name="photo"
                                            value="Add a picture to a new product">
                                    </div>

                                    <div>
                                        @error('photo')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>

                                    <div id="holder" style="margin-top:15px;width: 150px;"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="brand_id">
                                                Brand<span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select form-select-lg mb-3 @error('brand_id') border border-danger @enderror"
                                                    name="brand_id" aria-label=".form-select-lg example">
                                                <option selected value="">-- Choose brand --</option>

                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>

                                            <div>
                                                @error('brand_id')
                                                    @include('backend.includes.messages_errors')
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">
                                                Category<span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select form-select-lg mb-3 @error('category_id') border border-danger @enderror"
                                                    name="category_id" aria-label=".form-select-lg example" id="cat_id">
                                                <option selected value="">-- Choose category --</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>

                                            @error('category_id')
                                                @include('backend.includes.messages_errors')
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="size">
                                                Size<span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select form-select-lg mb-3 @error('size') border border-danger @enderror"
                                                    name="size" aria-label=".form-select-lg example">
                                                <option selected value="">-- Choose size --</option>

                                                <option value="S" {{ old('size')=='S' ? 'selected' : '' }}>
                                                    Small
                                                </option>

                                                <option value="M" {{ old('size')=='M' ? 'selected' : '' }}>
                                                    Medium
                                                </option>

                                                <option value="L" {{ old('size')=='L' ? 'selected' : '' }}>
                                                    Large
                                                </option>
                                            </select>

                                            @error('size')
                                                @include('backend.includes.messages_errors')
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="condition">
                                                Condition<span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select  form-select-lg mb-3 @error('condition') border border-danger @enderror"
                                                    name="condition" aria-label=".form-select-lg example">
                                                <option selected value="">-- Choose condition --</option>

                                                <option value="new" {{ old('condition')=='new' ? 'selected' : '' }}>
                                                    New
                                                </option>

                                                <option value="popular" {{ old('condition')=='popular' ? 'selected' : '' }}>
                                                    Popular
                                                </option>

                                                <option value="winter" {{ old('condition')=='winter' ? 'selected' : '' }}>
                                                    Winter
                                                </option>
                                            </select>

                                            @error('condition')
                                                @include('backend.includes.messages_errors')
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="vendor_id">
                                                Vendor
                                            </label>

                                            <select class="form-select form-select-lg mb-3 @error('vendor_id') border border-danger @enderror"
                                                    name="vendor_id" aria-label=".form-select-lg example">
                                                <option selected value="">-- Choose vendor --</option>

                                                @foreach($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->company }}</option>
                                                @endforeach
                                            </select>

                                            @error('vendor_id')
                                                @include('backend.includes.messages_errors')
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="status">
                                                Status<span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select form-select-lg mb-3 @error('status') border border-danger @enderror"
                                                    name="status" aria-label=".form-select-lg example">
                                                <option selected value="">-- Choose status --</option>

                                                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>
                                                    Active
                                                </option>

                                                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>

                                            @error('status')
                                                @include('backend.includes.messages_errors')
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add product</button>
                                </div>
                            </div>
                        </form>

                        <div style="margin-top: -20px; margin-bottom: 20px; margin-left: -10px">
                            <a href="{{ route('banners.index') }}">
                                <button type="submit" class="btn btn-danger ml-4">Back</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php
    if(isset($modal)) {
        echo('$(window).load(function(){$("#' . $modal . '").modal(\'show\');});');
    }
    ?>
@endsection
