@extends('backend.layouts.admin')

@section('title', 'Categories')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Categories({{ \App\Models\Category::count() }})
        </h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('categories.create') }}">
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>{{ $category->title }}</td>

                                        <td>
                                            <img width="100px" src="{{ $category->photo }}" alt="{{ $category->title }}">
                                        </td>

                                        <td>
                                            <input type="checkbox" data-toggle="toggle" value="{{ $category->id }}" data-on="Active"
                                                   data-off="Inactive" {{ $category->status=='active' ? 'checked' : '' }}
                                                   data-onstyle="success" data-offstyle="secondary" name="toggle_category">
                                        </td>

                                        <td>
                                            <div class="row text-left">
                                                <div class="col-lg-1 col-xl-1 col-md-1 col-sm-1 col-1">
                                                    <a href="{{ route('categories.edit', $category) }}">
                                                        <button class="btn btn-dark">Edit</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                                    <div style="margin-left: 26px">
                                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-toggle="tooltip" type="submit" class="dltBtn_category mr-8 btn btn-danger"
                                                                    data-id="{{ $category->id }}" data-placement="bottom">Delete</button>
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

@section('scripts')
    <script>
        $('input[name=toggle_category]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url: "{{ route('categories.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function (response) {
                    if(response.status) {
                        swal({
                            title: "Your choice is saved!",
                            text: response.message,
                            icon: "success",
                            button: "Done!"
                        });
                    }
                    else {
                        alert('Please, try one more time')
                    }
                }
            })
        });
    </script>
@endsection
