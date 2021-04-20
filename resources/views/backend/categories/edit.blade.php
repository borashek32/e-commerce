@extends('backend.layouts.admin')

@section('title', 'Add banner')

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
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') border border-danger @enderror"
                                           id="title" placeholder="Add some title of the banner" value="{{ $banner->title }}" required>

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
                                    <label for="feature_image">Photo</label>

                                    <div class="input-group" style="margin-bottom: 15px">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" value="{{ $banner->photo }}" class="form-control
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
                                    <button type="submit" class="btn btn-primary">Update banner</button>
                                </div>
                            </div>
                        </form>
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection
