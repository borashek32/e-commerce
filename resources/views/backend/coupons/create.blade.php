@extends('backend.layouts.admin')

@section('title', 'Add banner')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Coupons({{ \App\Models\Coupon::count() }})
        </h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-2">Create new coupon</h5>

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
                        <form action="{{ route('coupons.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="code">
                                        Code<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="code" class="form-control @error('code') border border-danger @enderror"
                                           id="code" placeholder="Add a code of the coupon" value="">

                                    <div>
                                        @error('code')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>

                                    <select class="form-select col-lg-4 col-xl-4 col-md-4 col-sm-6 col-8 form-select-lg mb-3"
                                            name="type" aria-label=".form-select-lg example">
                                        <option selected value="">-- Choose condition --</option>

                                        <option value="fixed" {{ old('type')=='fixed' ? 'selected' : '' }}>
                                            Fixed
                                        </option>

                                        <option value="percent" {{ old('type')=='percent' ? 'selected' : '' }}>
                                            Percent
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="value">
                                        Value<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="value" class="form-control @error('value') border border-danger @enderror"
                                           id="value" placeholder="Add a type of the coupon" value="">

                                    <div>
                                        @error('value')
                                            @include('backend.includes.messages_errors')
                                        @enderror
                                    </div>
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
                                    <button type="submit" class="btn btn-primary">Add coupon</button>
                                </div>
                            </div>
                        </form>

                        <div style="margin-top: -20px; margin-bottom: 20px; margin-left: -10px">
                            <a href="{{ route('coupons.index') }}">
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
