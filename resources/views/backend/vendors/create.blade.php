@extends('backend.layouts.admin')

@section('title', 'Add brand')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Brands({{ \App\Models\Brand::count() }})
        </h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-2">Create new vendor</h5>

                    <p class="text-xs">
                        <span class="text-danger">*</span> - these fields are required
                    </p>

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('brands.store') }}" method="POST">
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
                                               type="text" name="photo" value="Add a picture to a new brand">
                                    </div>

                                    <div>
                                        @error('photo')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>

                                    <div id="holder" style="margin-top:15px;width: 150px;"></div>
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
                                    <button type="submit" class="btn btn-primary">Add brand</button>
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
