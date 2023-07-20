<x-layout>
    <x-header>
        {{__('ui.register')}}
    </x-header>
    
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('register')}}" class="p-4 mb-5 rounded w-75 mx-auto bg-dark tx-p font-p">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="m-0 form-label"> {{__('ui.email-add')}}</label>
                        <input type="email" name="email" class="form-control font-p shadow" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="m-0 form-label">Username</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="m-0 form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="m-0 form-label"> {{__('ui.pass-conf')}}</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
      
                    <button type="submit" class="btn btn-primary">  {{__('ui.register')}}</button>
                </form>
                
            </div>
        </div>
    </div>
    
</x-layout>    