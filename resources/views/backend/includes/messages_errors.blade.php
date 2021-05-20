@if(session('error'))
    <div class="alert alert-danger mt-2 alert-dismissible fade show" id="alert" role="alert">
        {{ session('error') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

