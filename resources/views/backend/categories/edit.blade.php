@extends('backend.layouts.admin')

@section('title', 'Edit category')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Categories({{ \App\Models\Category::count() }})
        </h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-2">Edit the category</h5>

                    <p class="text-xs">
                        <span class="text-danger">*</span> - these fields are required
                    </p>

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">
                                        Title<span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="title" class="form-control @error('title') border border-danger @enderror"
                                           id="title" placeholder="Add some title of a new banner" value="{{ $category->title }}">

                                    <div>
                                        @error('title')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <label for="summary">Description</label>

                                <div class="form-group">
                                    <textarea placeholder="Add some description of the banner" id="description"
                                         class="form-control" name="summary">{{ $category->summary }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="is_parent">
                                        Is parent category<span class="text-danger">*</span>:
                                    </label>

                                    <input id="is_parent" class="ml-2" type="checkbox" name="is_parent"
                                        value="{{ $category->is_parent }}" {{ $category->is_parent == 1 ? 'checked' : '' }}>Yes
                                </div>

                                <div class="form-group {{ $category->is_parent == 1 ? 'd-none' : '' }}" id="parent_cat_div">
                                    <label for="description">Parent Category</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                        name="parent_id" aria-label=".form-select-lg example">

                                        <option selected value="{{ $category->parent_id }}">
                                            -- Choose parent category --
                                        </option>

                                        @foreach($parent_cats as $parent_cat)
                                            <option value="{{ $parent_cat->id }}" {{ $parent_cat->id == $category->parent_id ? 'selected' :'' }}>
                                                {{ $parent_cat->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>

                                    <div class="input-group" style="margin-bottom: 15px">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>

                                        <input id="thumbnail" value="{{ $category->photo }}" class="form-control text-secondary"
                                               type="text" name="photo">
                                    </div>

                                    @if($category->photo)
                                        <img src="{{ $category->photo }}" id="holder" style="margin-top:15px;width: 150px;">
                                    @else
                                        <p>Photo is not chosen</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="status">
                                        Status<span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="status" aria-label=".form-select-lg example">
                                        <option selected value="{{ $category->status }}">-- Choose status --</option>

                                        <option value="active" {{ $category->status=='active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive" {{ $category->status=='inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>

                                    <div>
                                        @error('status')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update category</button>
                                </div>
                            </div>
                        </form>

                        <div style="margin-top: -20px; margin-bottom: 20px; margin-left: -10px">
                            <a href="{{ route('categories.index') }}">
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
