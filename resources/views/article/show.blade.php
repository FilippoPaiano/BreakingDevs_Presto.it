<x-layout>

    <x-header>
        @if($article->is_accepted == 1)
          {{$article->title}}
        @elseif(Auth::user() == null) 
          {{__('ui.error')}}
        @elseif(Auth::user()->is_revisor == 1)
          {{$article->title}}
        @elseif(Auth::user()->is_revisor == '0')
          {{__('ui.error')}}
        @endif
    </x-header>

    @if($article->is_accepted == 1)
      <div class="container justify-content-center w-50 mt-5">
        <div class="card shadow bg-dark rounded-5">
            <div class="row">
              <div class="col-12 col-md-6 align-items-center d-flex justify-content-center">
                <div class="carousel slide " data-bs-ride="carousel" id="showCarousel">
                  @if($article->images->isNotEmpty())
                  <div class="carousel-inner">
                      @foreach($article->images as $image)
                      <div class="carousel-item @if($loop->first) active @endif">
                          <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded-5" alt="">
                      </div>
                      @endforeach
                      <button type="button" class="carousel-control-prev" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden" aria-hidden="true">Precedente</span>
                      </button>
                      <button type="button" class="carousel-control-next" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden" aria-hidden="true">Successivo</span>
                    </button>
                  </div>
                  @else
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="/media/noimage_400x300.jpg" class="img-fluid p-3 rounded-5" alt="">
                    </div>
                  </div>
                  
                  @endif
                  
                </div>
              </div>
              <div class="col-12 col-md-6 pe-4 text-center" style="height: 275px;">
                <h3 class="card-title font-p m-0 tx-p p-3">{{$article->title}}</h3>
                <p class="card-text text-muted">{{$article->condition}}</p>
                <p class="card-text fs-3 font-p tx-p">{{$article->price}} €</p>
                <p class="card-text text-muted fs-5 me-4">{{$article->description}}</p>
                <a href="{{route('categoryShow', ['category' => $article->category->id])}}" class="my-2 btn-toolset">
                  @if(session('locale')=='en')
                  {{$article->category->nameEN}}
                  @elseif(session('locale')=='es')
                  {{$article->category->nameES}}
                  @else
                   {{$article->category->name}}
                  @endif
                </a>
                <p class="small text-muted m-0">{{__('ui.article-date')}} {{$article->created_at->format('d/m/Y')}}</p>
                </div>

              </div>
        </div>
          
        </div>
      </div>

    @elseif(Auth::user() == null)
    <div class="col-12 d-flex justify-content-center">
      <div class="alert alert-warning my-5 py-3 shadow d-flex justify-content-center w-50 font-s">
          <p class="lead">{{__('ui.not-found')}}</p>
      </div>
    </div>

    @elseif(Auth::user()->is_revisor == 1)
    <div class="container justify-content-center w-50 mt-5">
      <div class="card shadow bg-dark rounded-5">
          <div class="row">
            <div class="col-12 col-md-6 align-items-center d-flex justify-content-center">
              <div class="carousel slide " data-bs-ride="carousel" id="showCarousel">
                @if($article->images->isNotEmpty())
                <div class="carousel-inner">
                    @foreach($article->images as $image)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded-5" alt="">
                    </div>
                    @endforeach
                    <button type="button" class="carousel-control-prev" data-bs-target="#showCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden" aria-hidden="true">Precedente</span>
                    </button>
                    <button type="button" class="carousel-control-next" data-bs-target="#showCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden" aria-hidden="true">Successivo</span>
                  </button>
                </div>
                @else
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/media/noimage_400x300.jpg" class="img-fluid p-3 rounded-5" alt="">
                  </div>
                </div>
                
                @endif
                
              </div>
            </div>
            <div class="col-12 col-md-6 text-center" style="height: 275px;">
              <h3 class="card-title font-p tx-p px-3 pt-3">{{$article->title}}</h3>
              <p class="card-text text-muted">{{$article->condition}}</p>
              <p class="card-text fs-3 font-p tx-p">{{$article->price}} €</p>
              <p class="card-text text-muted fs-5 me-4">{{$article->description}}</p>
              <a href="{{route('categoryShow', ['category' => $article->category->id])}}" class="my-2 btn-toolset">
                @if(session('locale')=='en')
                {{$article->category->nameEN}}
                @elseif(session('locale')=='es')
                {{$article->category->nameES}}
                @else
                 {{$article->category->name}}
                @endif
              </a>
              <p class="small text-muted m-0">{{__('ui.article-date')}} {{$article->created_at->format('d/m/Y')}}</p>
              </div>

            </div>
      </div>
        
      </div>
    </div>

    @elseif(Auth::user()->is_revisor == '0')
    <div class="col-12 d-flex justify-content-center">
      <div class="alert alert-warning my-5 py-3 shadow d-flex justify-content-center w-50 font-s">
          <p class="lead">{{__('ui.not-found')}}</p>
      </div>
    </div>

    @endif



</x-layout>