@extends('backend.layouts.admin')

@section('title', 'Banners')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Banners({{ \App\Models\Banner::count() }})
        </h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('banners.create') }}">
            <button type="submit" class="btn btn-primary">Create</button>
        </a>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        @if (session()->has('success'))
                            @include('backend.includes.messages_success')
                        @endif
                    </div>

                    <div class="card card-primary">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Condition</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>{{ $banner->title }}</td>

                                        <td>{!! $banner->description !!}</td>

                                        <td>
                                            <img width="100px" src="{{ $banner->photo }}" alt="{{ $banner->title }}">
                                        </td>

                                        <td>
                                            @if($banner->condition=='banner')
                                                <p class="text-muted">{{ $banner->condition }}</p>
                                            @else
                                                <p class="text-muted">{{ $banner->condition }}</p>
                                            @endif
                                        </td>

                                        <td>
                                            <input type="checkbox" data-toggle="toggle" value="{{ $banner->id }}" data-on="Active"
                                                   data-off="Inactive" {{ $banner->status=='active' ? 'checked' : '' }}
                                                   data-onstyle="success" data-offstyle="secondary" name="toggle">
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3">
                                                    <a href="{{ route('banners.edit', $banner) }}">
                                                        <button class="btn btn-dark">Edit</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                                    <form action="{{ route('banners.destroy', $banner->id) }}" class="ml-2" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" type="submit" class="dltBtn btn btn-danger"
                                                                data-id="{{ $banner->id }}" data-placement="bottom">Delete</button>
                                                    </form>
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

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('input[name=toggle]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url: "{{ route('banners.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if(response.status) {
                        swal({
                            title: "Your choice is saved!",
                            text: response.message,
                            icon: "success",
                            button: "Done!",
                        });
                    }
                    else {
                        alert('Please, try one more time')
                    }
                }
            })
        });
    </script>
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
                    if (willDelete) {
                        form.submit();
                        swal("Banner has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Banner is saved!");
                    }
                });
        })
    </script>
@endsection
