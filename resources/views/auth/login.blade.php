<x-layout>
    <x-header>
        {{__('ui.login')}}
    </x-header>
    
    <x-session-messages />
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('login')}}" class="p-4 mb-5 rounded w-75 mx-auto bg-dark">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="tx-p font-p m-0 form-label">   {{__('ui.email-add')}}</label>
                        <input type="email" name="email" class="form-control font-p shadow" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="tx-p font-p m-0 form-label">Password</label>
                        <input type="password" name="password" class="form-control font-p shadow" id="password">
                    </div>
 
                    {{-- <div class="mb-3 form-check">
                        <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ricordami</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">   {{__('ui.login')}}</button>
                </form>
                
            </div>
        </div>
    </div>
    
</x-layout>