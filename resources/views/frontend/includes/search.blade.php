<form method="get" action="{{ route('e-app') }}" class="input-group mb-3">
    <input type="text" class="form-control" style="margin-bottom:0px;margin-right: 10px"
           placeholder="Enter what are you looking for"
           aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">

    <button type="submit" class="btn btn-primary" style="height: 40px">
        Search
    </button>

    <a href="#">
        <button type="submit" class="btn btn-secondary" style="height: 40px;margin-left: 10px;">
            Refresh
        </button>
    </a>
</form>

