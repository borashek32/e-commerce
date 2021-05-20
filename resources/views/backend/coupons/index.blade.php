@extends('backend.layouts.admin')

@section('title', 'Coupons')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">
            Coupons({{ \App\Models\Coupon::count() }})
        </h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('coupons.create') }}">
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
                                    <th scope="col">Code</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>{{ $coupon->code }}</td>

                                        <td>{{ $coupon->type }}</td>

                                        <td>{{ $coupon->value }}</td>

                                        <td>
                                            <input type="checkbox" data-toggle="toggle" value="{{ $coupon->id }}" data-on="Active"
                                                   data-off="Inactive" {{ $coupon->status=='active' ? 'checked' : '' }}
                                                   data-onstyle="success" data-offstyle="secondary" name="toggle_coupon">
                                        </td>

                                        <td>
                                            <div class="row text-left">
                                                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3">
                                                    <a href="{{ route('coupons.edit', $coupon) }}">
                                                        <button class="btn btn-dark">Edit</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-6">
                                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" type="submit" class="dltBtn_banner btn btn-danger"
                                                                data-id="{{ $coupon->id }}" data-placement="bottom">Delete</button>
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
        $('input[name=toggle_coupon]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url: "{{ route('coupons.status') }}",
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
