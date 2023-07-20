<x-layout>

    <x-header>
        {{$article_to_check ? __('ui.revisor-title') : __('ui.revisor-title-empty')}}
    </x-header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center d-flex my-2">
                <a href="{{route('revisor.edit')}}" class="btn btn-warning">{{__('ui.revisor-button')}}</a>
            </div>
        </div>
    </div>


   
    @if($article_to_check)
    {{-- @if($article_to_check->images->isNotEmpty()) --}}
    <div class="container mt-5 bg-dark rounded-5">
        <div class="row">
            
                    <div class="col-5 col-md-4 text-center py-4">
                        <h4 class="card-title font-p tx-p p-3">{{$article_to_check->title}}</h4>
                        <p class="card-text text-muted">{{$article_to_check->condition}}</p>
                        <p class="card-text fs-4 font-p tx-p">{{$article_to_check->price}} €</p>
                        <p class="card-text text-muted fs-5 me-4">{{$article_to_check->description}}</p>
                        <p class="small text-muted mt-5">{{__('ui.article-date')}}: {{$article_to_check->created_at->format('d/m/Y')}}</p>
                        <a href="/category/{{$article_to_check->category->id}}"
                            class="my-2 btn-toolset">
                                @if(session('locale')=='en')
                                {{$article_to_check->category->nameEN}}
                                @elseif(session('locale')=='es')
                                {{$article_to_check->category->nameES}}
                                @else
                                {{$article_to_check->category->name}}
                                @endif
                        </a>
                            
                    </div>
                    
                    <div class="col-7 col-md-4">
                        @if($article_to_check->images->isNotEmpty())
                        <div class="carousel slide h-100" data-bs-ride="carousel" id="showCarousel">
                                <div class="carousel-inner h-100 align-items-center d-flex">
                                    @foreach($article_to_check->images as $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded-5" alt="">
                                    </div>
                                    @endforeach
                                    <button type="button" class="carousel-control-prev" data-bs-target="#showCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden" aria-hidden="true">Precedente</span>
                                    </button>
                                    <button type="button" class="carousel-control-next" data-bs-target="#showCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden" aria-hidden="true">Successivo</span>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <img src="/media/noimage.jpg" class="img-fluid p-3 rounded-5" alt="">
                            </div>
                    
                        @endif
                    
                    </div>
                @if($article_to_check->images->isNotEmpty())    
                    <div class="col-12 col-md-4 tx-p font-p p-3">
                        <div class=" border-en">
                            <h5 class="tc-accent mb-0">Tags</h5>
                            <div class="p-2 text-secondary">
                                @if($image->labels)
                                @foreach($image->labels as $label)
                                <p class="d-inline">{{$label}} |</p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="">
                            <h5 class="tc-accent"> {{__('ui.image-rev')}}</h5>
                            <p class="text-secondary">{{__('ui.val-adult')}}:<span class="{{$image->adult}}"></span></p>
                            <p class="text-secondary">{{__('ui.val-spoof')}}: <span class="{{$image->spoof}}"></span></p>
                            <p class="text-secondary">{{__('ui.val-medical')}}: <span class="{{$image->medical}}"></span></p>
                            <p class="text-secondary">{{__('ui.val-violence')}}: <span class="{{$image->violence}}"></span></p>
                            <p class="text-secondary">{{__('ui.val-racy')}}: <span class="{{$image->racy}}"></span></p>
                        </div>
                    </div>
                @else
                <div class="col-12 col-md-4 justify-content-center d-flex align-items-center">
                    <h5 class="font-p text-secondary">{{__('ui.tag-not-avaible')}}</h3>
                </div>
                @endif
            
        </div>
    </div>

    {{-- @endif --}}
            
            
            
    <div class="container-fluid">
    <div class="row my-3">
        <div class="col-12 justify-content-center d-flex">
            <div class="mx-3">
                <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow">{{__('ui.revisor-button-ok')}}</button>
                </form>
            </div>
            
            <div class="mx-3">
                <form action="{{route('revisor.reject_article', ['article'=>$article_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow">{{__('ui.revisor-button-x')}}</button>
                </form>
            </div>
            
        </div>
    </div>
        
        
    </div>
    
    @endif

    
    {{-- Articoli in coda --}}
    @if($article_to_check)
    <hr>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <h4 class="text-center font-p">{{__('ui.article-queue')}}:</h4>
    @endif
    @foreach ($articles as $article)
    @if($article->is_accepted == null && $article->is_accepted != '0' && ($article_to_check->id != $article->id))
    
            <div class="col-12 py-3 d-flex justify-content-center h-100">
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
            @endif
            @endforeach
        </div>
        </div>




</x-layout>
