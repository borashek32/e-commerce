<form action="{{ route('user.shipping-address', $user->id) }}" method="post">
    @csrf
    <div class="mt-3">
        <h4>Shipping Address</h4>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail5" class="form-label">Country</label>
        <input type="text" class="form-control" value="{{ $user->scountry }}" placeholder="USA"
               name="scountry" id="exampleInputEmail5" aria-describedby="scountry">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail6" class="form-label">Postcode</label>
        <input type="text" class="form-control" value="{{ $user->spostcode }}" placeholder="111111"
               name="spostcode" id="exampleInputEmail6" aria-describedby="spostcode">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail7" class="form-label">City</label>
        <input type="text" class="form-control" value="{{ $user->scity }}" placeholder="New-York"
               name="scity" id="exampleInputEmail7" aria-describedby="scity">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail8" class="form-label">State</label>
        <input type="text" class="form-control" value="{{ $user->sstate }}" placeholder="New-York"
               name="sstate" id="exampleInputEmail8" aria-describedby="sstate">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail9" class="form-label">Address</label>
        <input type="text" class="form-control" value="{{ $user->saddress }}" placeholder="st. Main st., 34/2 567"
               name="saddress" id="exampleInputEmail9" aria-describedby="saddress">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
