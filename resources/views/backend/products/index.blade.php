@extends('backend.layouts.admin')

@section('title', 'Products')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Products({{ \App\Models\Product::count() }})
        </h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('products.create') }}">
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
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Condition</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $product->title }}</td>
                                        <td><img width="100px" src="{{ $product->photo }}" alt="{{ $product->title }}"></td>
                                        <td>$ {{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->discount }}%</td>
                                        <td>{{ $product->size }}</td>
                                        <td>
                                            @if($product->condition)
                                                <p class="text-muted">{{ $product->condition }}</p>
                                            @else
                                                <p class="text-muted">{{ $product->condition }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" value="{{ $product->id }}" data-on="Active"
                                                   data-off="Inactive" {{ $product->status=='active' ? 'checked' : '' }}
                                                   data-onstyle="success" data-offstyle="secondary" name="toggle_product">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-2">
                                                    <a href="{{ route('products.edit', $product) }}">
                                                        <button class="btn btn-dark">Edit</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" type="submit" class="dltBtn_banner ml-2 btn btn-danger"
                                                                data-id="{{ $product->id }}" data-placement="bottom">Delete</button>
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
    <script>
        $('input[name=toggle_product]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url: "{{ route('products.status') }}",
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
