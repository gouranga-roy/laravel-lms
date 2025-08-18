<!-- Show Success Message -->
@if (Session::has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Show Error Message -->
@if($errors -> any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! $errors->first() !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif