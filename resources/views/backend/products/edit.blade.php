@extends('backend.layouts.admin')

@section('title', 'Edit product')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Banners({{ \App\Models\Banner::count() }})
        </h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-2">Edit the banner</h5>

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('banners.update', $banner->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">
                                        Title<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="title" class="form-control @error('title') border border-danger @enderror"
                                           id="title" placeholder="Add some title of the banner" value="{{ $banner->title }}">

                                    <div>
                                        @error('title')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <label for="description">Description</label>

                                <div class="form-group">
                                    <textarea placeholder="Add some description of the banner" id="description"
                                         class="form-control" name="description">{{ $banner->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="feature_image">
                                        Photo<span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group" style="margin-bottom: 15px">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" value="{{ $banner->photo }}" class="form-control text-secondary
                                            @error('photo') border border-danger @enderror" type="text" name="photo">
                                    </div>

                                    <div>
                                        @error('photo')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>

                                    <img id="holder" src="@if($banner->photo) {{ $banner->photo }} @endif" style="margin-top:15px;width: 150px;">
                                </div>

                                <div class="form-group">
                                    <label for="condition">Condition</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="condition" aria-label=".form-select-lg example">
                                        <option selected value="{{ $banner->condition }}">-- Choose condition --</option>

                                        <option value="banner" {{ $banner->condition=='banner' ? 'selected' : '' }}>
                                            Banner
                                        </option>

                                        <option value="promo" {{ $banner->condition=='promo' ? 'selected' : '' }}>
                                            Promo
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">
                                        Status<span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="status" aria-label=".form-select-lg example">
                                        <option selected value="{{ $banner->status }}">-- Choose status --</option>

                                        <option value="active" {{ $banner->status=='active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive" {{ $banner->status=='inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update banner</button>
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
