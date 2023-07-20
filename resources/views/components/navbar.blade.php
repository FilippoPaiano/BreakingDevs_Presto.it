<nav class="sfondo-nav navbar navbar-expand-lg font-p">
    <div class="container-fluid">
        <a class="navbar-brand brand-custom" href="{{route('homepage')}}">
            
            <img src="/media/Logo_presto_nero_thin.png" class="img-fluid logo">
            
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto align-items-center">
            @auth
            <li class="nav-item mx-3">
                <a class="@if(Route::is('article.create')) active @endif nav-link link-custom"
                href="{{route('article.create')}}">{{__('ui.n-l-1')}}</a>
            </li>
            @endauth

            {{-- Articoli --}}
            <li class="nav-item mx-3">
                <a class="@if(Route::is('article.index')) active @endif nav-link link-custom"
                href="{{route('article.index')}}">{{__('ui.n-l-2')}}</a>
            </li>
            {{-- /Articoli --}}

            {{-- Categorie --}}

            <li class="nav-item mx-3 dropdown">
                <a href="" class="nav-link link-custom dropdown-toggle toggle-custom @if(Route::is('categoryShow')) active @endif" onclick=""
                id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('ui.categories')}}
            </a>
                <ul class="dropdown-menu avviso-custom" aria-labelledby="categoriesDropdown">
                    @foreach($categories as $category)
                        @if(session('locale')=='en')
                        <li><a class="dropdown-item dropdown-custom text-white"
                            href="{{route('categoryShow', compact('category'))}}">{{($category->nameEN)}}</a></li>
                        @elseif(session('locale')=='es')
                            <li><a class="dropdown-item dropdown-custom text-white"
                                href="{{route('categoryShow', compact('category'))}}">{{($category->nameES)}}</a></li>
                        @else 
                                <li><a class="dropdown-item dropdown-custom text-white"
                                    href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>

            {{-- /Categorie --}}

        </ul>
        <ul class="navbar-nav me-2 mb-2 mb-lg-0 align-items-center">

            {{-- Lingue --}}
            <li class="dropdown">
                
                <a class="nav-link link-custom dropdown-toggle toggle-custom" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-globe fa-lg"></i>
                </a>
              
                <ul class="dropdown-menu avviso-custom" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item dropdown-custom text-white" href="#"><x-_locale lang="it" /></a></li>
                  <li><a class="dropdown-item dropdown-custom text-white" href="#"><x-_locale lang="en" /></a></li>
                  <li><a class="dropdown-item dropdown-custom text-white" href="#"><x-_locale lang="es" /></a></li>
                </ul>
            </li>
              {{-- /Lingue --}}
            
              {{-- Profilo --}}
            <li class="nav-item dropdown">
                <a class="nav-link link-custom dropdown-toggle toggle-custom" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user() ? __('ui.profile') ." ". Auth::user()->name :  __('ui.guest')}}
                @auth
                @if (Auth::user()->is_revisor)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{App\Models\Article::toBeRevisionedCount()}}
                    <span class="visually-hidden">Unread messages</span>
                </span>
                @endif
                @endauth
            </a>
            <ul class="dropdown-menu avviso-custom">
                @auth
                @auth
                @if (Auth::user()->is_revisor)
                <li class="nav-item">
                    <a href="{{route('revisor.index')}}"
                    class="dropdown-item position-relative dropdown-custom text-white" aria-current="page">{{__('ui.n-d-2')}}
                        <span class="position-custom translate-middle badge rounded-pill bg-danger">
                            {{App\Models\Article::toBeRevisionedCount()}}
                            <span class="visually-hidden">Unread messages</span>
                        </span>
                    </a>
                </li>
                <hr class="dropdown-divider bg-secondary">
            @endif
            @endauth
        </li>
        <li><a class="dropdown-item dropdown-custom text-white" href="#"
            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
        </li>
        <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none">@csrf</form>
        @else
        <li><a class="dropdown-item dropdown-custom text-white" href="{{route('register')}}">{{__('ui.register')}}</a></li>
        <li><a class="dropdown-item dropdown-custom text-white" href="{{route('login')}}">{{__('ui.login')}}</a></li>
        @endauth
    </ul>
</li>
        {{-- /Profilo --}}
</ul>
@if (Route::is('homepage'))
@else
<form action="{{route('article.search')}}" method="GET" class="d-flex ps-3">
    <input type="search" name="searched" class="form-control me-2 rounded-pill" placeholder="Cerca..."
    aria-label="Search">
    <button type="submit" class="bg-transparent border-0 mt-1"><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
        <lord-icon
        src="https://cdn.lordicon.com/rlizirgt.json"
        trigger="hover"
        colors="primary:#ffffff"
        style="width:25px;height:25px"
        >
    </lord-icon>
</button>
</form>
@endif
</div>
</div>
</nav>
