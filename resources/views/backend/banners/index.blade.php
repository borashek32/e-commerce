@extends('backend.layouts.admin')

@section('title', 'Banners')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="column">
                <h1 class="h3 mb-0 text-gray-800 mb-2">
                    Banners({{ \App\Models\Banner::count() }})
                </h1>

                <a href="{{ route('banners.create') }}">
                    <button type="submit" class="btn btn-primary">Create</button>
                </a>
            </div>

        </div>

        <!-- Content Row -->
        <section class="content">
            <div class="text-center">
                @if (session()->has('success'))
                    @include('backend.includes.messages_success')
                @endif
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <th scope="row">{{ $banner->id }}</th>
                                            <td>{{ $banner->title }}</td>
                                            <td><img width="100px" src="{{ $banner->photo }}" alt="{{ $banner->title }}"></td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('banners.edit', $banner) }}">
                                                        <button class="btn btn-secondary">Edit</button>
                                                    </a>

                                                    <form action="{{ route('banners.destroy', $banner->id) }}" class="ml-2" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" type="submit" class="dltBtn btn btn-danger"
                                                                data-id="{{ $banner->id }}" data-placement="bottom">Delete</button>
                                                    </form>
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
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this banner!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    form.submit();
                    if (willDelete) {
                        swal("The banner has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("The banner is safe!");
                    }
                });
        })
    </script>
@endsection
