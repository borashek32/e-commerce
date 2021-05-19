<form action="{{ route('user.billing-address', $user->id) }}" method="POST">
    @csrf
    <div class="mt-3">
        <h4>Billing Address</h4>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail5" class="form-label">Country</label>
        <input type="text" class="form-control" value="{{ $user->country }}" placeholder="USA"
               name="country" id="exampleInputEmail5" aria-describedby="country">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail6" class="form-label">Postcode</label>
        <input type="text" class="form-control" value="{{ $user->postcode }}" placeholder="111111"
               name="postcode" id="exampleInputEmail6" aria-describedby="postcode">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail7" class="form-label">City</label>
        <input type="text" class="form-control" value="{{ $user->city }}" placeholder="New-York"
               name="city" id="exampleInputEmail7" aria-describedby="city">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail8" class="form-label">State</label>
        <input type="text" class="form-control" value="{{ $user->state }}" placeholder="New-York"
               name="state" id="exampleInputEmail8" aria-describedby="state">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail9" class="form-label">Address</label>
        <input type="text" class="form-control" value="{{ $user->address }}" placeholder="st. Main st., 34/2 567"
               name="address" id="exampleInputEmail9" aria-describedby="address">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
