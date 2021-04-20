@extends('backend.layouts.admin')

@section('title', 'Add banner')

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
                    <h5 class="mb-2">Create new category</h5>

                    <p class="text-xs">
                        <span class="text-danger">*</span> - these fields are required
                    </p>

{{--                    @if($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach($errors-all())--}}
{{--                                    <li>{{ $erorr }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">
                                        Title<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="title" class="form-control @error('title') border border-danger @enderror"
                                           id="title" placeholder="Add some title of a new banner" value="{{ old('title') }}" required>
                                    <div>
                                        @error('title')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <label for="description">Summary</label>

                                <div class="form-group">
                                    <textarea placeholder="Add some description of the banner" id="description"
                                         class="form-control" name="summary">{{ old('summary') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">
                                        Is parent<span class="text-danger">*</span>:
                                    </label>

                                    <input id="is_parent" type="checkbox" name="is_parent" value="1" checked>Yes
                                </div>

                                <div class="form-group d-none" id="parent_cat_div">
                                    <label for="description">Parent Category</label>
                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="parent_id" aria-label=".form-select-lg example">
                                        <option selected value="parent_id">-- Choose parent category --</option>
                                        <option value="banner" {{ old('condition')=='banner' ? 'selected' : '' }}>
                                            Banner
                                        </option>
                                        <option value="promo" {{ old('condition')=='promo' ? 'selected' : '' }}>
                                            Promo
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="feature_image">Photo</label>

                                    <div class="input-group" style="margin-bottom: 15px">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control @error('photo') border border-danger @enderror"
                                               type="text" name="photo">
                                    </div>

                                    <div>
                                        @error('photo')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>

                                    <div id="holder" style="margin-top:15px;width: 150px;"></div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="parent_id" aria-label=".form-select-lg example">
                                        <option value="">-- Choose status --</option>
                                        <option selected value="banner" {{ old('status')=='active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="promo" {{ old('status')=='inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add category</button>
                                    <a href="{{ route('banners.index') }}">
                                        <button type="submit" class="btn btn-danger ml-4">Back</button>
                                    </a>
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

@endsection
