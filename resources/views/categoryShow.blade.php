<x-layout>

<x-header> 
    @if(session('locale')=='it')
        {{__('ui.insert-article-category')}} {{$category->name}}
    @elseif(session('locale')=='en')
        {{__('ui.insert-article-category')}} {{$category->nameEN}}
    @elseif(session('locale')=='es')
        {{__('ui.insert-article-category')}} {{$category->nameES}}
    @endif
</x-header>

<div class="container">
    <div class="row">
        @forelse($category->articles->filter(function($value){return $value->is_accepted == 1;}) as $article)
        
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
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-5">
                <div class="alert alert-warning py-3 shadow d-flex justify-content-center w-50 tx-p font-s avviso-custom">
                    <p class="lead">{{__('ui.not-found-category')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-5 font-p">
                <p class="h2">{{__('ui.insert-title')}}</p>
            </div>
            <div class="col-12 d-flex justify-content-center  font-p">
                <a href="{{route('article.create')}}" class="btn btn-success shadow">{{__('ui.not-found-new')}}</a>
            </div>
        </div>
            

            
        @endforelse
        
    </div>
</div>


</x-layout>