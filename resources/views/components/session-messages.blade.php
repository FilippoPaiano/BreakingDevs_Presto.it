@if (session('successMessage'))
    <div class="alert alert-success text-center rounded-5">
        {{session('successMessage')}}
    </div>
@endif

@if (session('access.denied'))
    <div class="alert alert-warning text-center">
        {{session('access.denied')}}
    </div>
@endif

