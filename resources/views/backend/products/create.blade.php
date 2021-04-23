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
                                           id="title" placeholder="Add some title of a new banner" value="{{ old('title') }}">

                                    <div>
                                        @error('title')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="summary">Summary</label>

                                    <div class="form-group">
                                        <textarea placeholder="Add some summery description about a new product" id="summary"
                                             class="form-control" name="summary">{{ old('summary') }}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <label for="description">Description</label>

                                    <div class="form-group">
                                        <textarea placeholder="Add some description about a new product" id="description"
                                             class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="stock">
                                        Stock<span class="text-danger">*</span>
                                    </label>

                                    <input type="number" name="stock" class="form-control @error('stock') border border-danger @enderror"
                                           id="stock" placeholder="Stock" value="{{ old('stock') }}">

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
                                    <label for="discount">Discount</label>

                                    <input type="number" name="discoun" class="form-control
                                        @error('discount') border border-danger @enderror" step="any"
                                           id="discount" placeholder="Discount" value="{{ old('discount') }}">

                                    <div>
                                        @error('discount')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
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

                                        <input id="thumbnail" class="form-control text-secondary @error('photo') border border-danger @enderror"
                                               type="text" name="photo" value="Add a picture to a new banner">
                                    </div>

                                    <div>
                                        @error('photo')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>

                                    <div id="holder" style="margin-top:15px;width: 150px;"></div>
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="condition" aria-label=".form-select-lg example">
                                        <option selected value="">-- Choose brand --</option>

                                        @foreach(\App\Models\Brand::get() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="cat_id" aria-label=".form-select-lg example" id="cat_id">
                                        <option selected value="">-- Choose category --</option>

                                        @foreach(\App\Models\Category::where('is_parent', 1)->get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group d-none" id="child_cat_div">
                                    <label for="child_cat_id">Subcategory</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                        name="child_cat_id" id="child_cat_id" aria-label=".form-select-lg example">
                                        <option selected value="">-- Choose subcategory --</option>

                                        @foreach(\App\Models\Category::where('parent_id', $category->id)->get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="size">Size</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
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
                                </div>

                                <div class="form-group">
                                    <label for="condition">Condition</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
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
                                </div>

                                <div class="form-group">
                                    <label for="vendor_id">Vendor</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="vendor_id" aria-label=".form-select-lg example">
                                        <option selected value="">-- Choose vendor --</option>

                                        @foreach(\App\Models\User::where('role', 'vendor')->get() as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">
                                        Status<span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="status" aria-label=".form-select-lg example">
                                        <option selected value="">-- Choose status --</option>

                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add banner</button>
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

@section('scripts')
    <script>
        $('#cat_id').change(function (e) {
            e.preventDefault();
            var is_checked = $('#cat_id').prop('checked');
            if (is_checked) {
                $('#child_cat_div').addClass('d-none');
                $('#child_cat_div').val('');
            }
            else {
                $('#child_cat_div').removeClass('d-none');
            }
        })
    </script>
    <script>
        $('#cat_id').change(function () {
            var cat_id = $(this).val();
            if (cat_id !=null) {
                $.ajax({
                    url: "/admin/category/"+cat_id+"/child",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        cat_id: cat_id
                    },
                    success: function (response) {
                        var html_option = <option value="">-- Choose subcategory --</option>
                        if (response.status) {
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data, function (id, title) {
                                html_option += "<option value='"+id+"'>"+title+"</option>"
                            });
                        }
                        else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
        });
    </script>
@endsection
