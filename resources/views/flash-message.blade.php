@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="border-0 alert alert-success alert-dismissible fade show rounded-0" role="alert">
        <b>{{ $message }}</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="border-0 alert alert-danger alert-dismissible fade show rounded-0" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="border-0 alert alert-warning alert-dismissible fade show rounded-0" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="border-0 alert alert-info alert-dismissible fade show rounded-0" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="border-0 alert alert-danger alert-dismissible fade show rounded-0" role="alert">
        <strong>Please check the form below for errors</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
