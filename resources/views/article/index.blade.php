<x-layout>
    
    <x-header>
        {{__('ui.allArticles')}}
    </x-header>
    
    <div class="container px-5 mx-auto">
        <div class="row my-5">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-6 my-auto">
                        <form action="{{route('article.search')}}" method="GET" class="d-flex">
                            <input type="search" name="searched" class="form-control me-2 rounded-pill" placeholder="Cerca..." aria-label="Search">
                            <button type="submit" class="bg-transparent border-0"><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                <lord-icon
                                src="https://cdn.lordicon.com/rlizirgt.json"
                                trigger="hover"
                                style="width:25px;height:25px"
                                >
                                </lord-icon>
                            </button>
                        </form>
                    </div>

                   {{--  <div class="col-6 d-flex justify-content-end">

                        <a href="" class="btn-tool dropdown-toggle nav-link link-custom toggle-custom" onclick=""
                            id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.categories')}}</a>
                        
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @foreach($categories as $category)
                                @if(session('locale')=='it')
                                <li><a class="dropdown-item"
                                    href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
                                @elseif(session('locale')=='en')
                                <li><a class="dropdown-item"
                                    href="{{route('categoryShow', compact('category'))}}">{{($category->nameEN)}}</a></li>
                                @elseif(session('locale')=='es')
                                <li><a class="dropdown-item"
                                    href="{{route('categoryShow', compact('category'))}}">{{($category->nameES)}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                                
                    </div>  --}}
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            @forelse($articles as $article)
            <div class="col-12 col-md-6 my-3 d-flex justify-content-center h-100">
                <div class="card shadow bg-dark rounded-5 h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-6 col-6 h-100 pe-0">
                            <a href="{{route('article.show', compact('article'))}}" class="text-decoration-none">
                            <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : '/media/noimage_400x300.jpg'}}" class="card-img-top p-3 h-100 rounded-5" alt="...">
                            </a>
                        </div>
                        <div class="col-md-6 col-6 h-100">
                            <a href="{{route('article.show', compact('article'))}}" class="text-decoration-none">
                                <h4 class="d-inline card-title font-p tx-p">{{$article->title}}</h4>
                            </a>
                            <p class="card-text font-s text-muted">-{{$article->condition}}</p>
                            <p class="card-text fs-4 font-p tx-p">{{$article->price}} €</p>
                            <p class="small font-s text-muted">{{__('ui.article-date')}} {{$article->created_at->format('d/m/Y')}}</p>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('categoryShow', ['category' => $article->category->id])}}" class="mt-3 me-3 font-p btn-toolset">
                                    @if(session('locale')=='en')
                                    {{$article->category->nameEN}}
                                    @elseif(session('locale')=='es')
                                    {{$article->category->nameES}}
                                    @else
                                     {{$article->category->name}}
                                    @endif
                                </a>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @empty
            
            <div class="col-12 d-flex justify-content-center">
                <div class="alert alert-warning py-3 shadow d-flex justify-content-center w-50 tx-p font-s avviso-custom">
                    <p class="lead">{{__('ui.not-found')}}</p>
                </div>
            </div>
            @endforelse
            
            {{$articles->links()}}
            
            
        </div>
    </div>
</x-layout>