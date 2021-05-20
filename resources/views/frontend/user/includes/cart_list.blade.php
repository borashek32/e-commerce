<table class="table">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Photo</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
        <tr>
            <th scope="row">
                {{ $loop->iteration }}
            </th>

            <td>
                <img src="{{ $item->model->photo }}" style="margin-top: 10px;width: 20px; height: 20px" alt="Product photo">
            </td>

            <td>
                <a class="" href={{ route('product', $item->model->slug) }}>
                    {{ $item->name }}
                </a>
            </td>

            <td>
                $<span>{{ number_format($item->price, 2) }}</span>
            </td>

            <td>
                <div class="quantity">
                    <input type="number" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}"
                           step="1" min="1" max="99" name="quantity" value="{{ $item->qty }}" class="qty">

                    <input type="hidden" data-id="{{ $item->rowId }}"
                           data-product-quantity="{{ $item->model->stock }}"
                           id="update-cart-{{ $item->rowId }}">
                </div>
            </td>

            <td>{{ $item->subtotal() }}</td>

            <td>
                <span data-id="{{ $item->rowId }}" class="cart_delete">
                    <i class="fa fa-trash" style="margin-top: 10px"></i>
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
