@extends('backend.layouts.admin')

@section('title', 'Brands')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Vendors({{ \App\Models\Vendor::count() }})
        </h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('vendors.create') }}">
            <button type="submit" class="btn btn-primary">Create</button>
        </a>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>{{ $vendor->company }}</td>

                                        <td>{{ $vendor->phone }}</td>

                                        <td>{{ $vendor->address }}</td>

                                        <td>
                                            <div class="row text-left">
                                                <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-2">
                                                    <a href="{{ route('vendors.edit', $vendor) }}">
                                                        <button class="btn btn-dark">Edit</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                                    <div style="margin-left: 20px">
                                                        <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-toggle="tooltip" type="submit" class="dltBtn_category mr-8 btn btn-danger"
                                                                    data-id="{{ $vendor->id }}" data-placement="bottom">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
