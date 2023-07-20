<x-layout>

<x-header> 
    {{__('ui.revisor-title')}}
</x-header>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('ui.rv-table-title')}}</th>
                    <th scope="col">{{__('ui.insert-article-category')}}</th>
                    <th scope="col">{{__('ui.rv-table-create')}}</th>
                    <th scope="col">{{__('ui.rv-table-state')}}</th>
                    <th scope="col">{{__('ui.rv-table-actions')}}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <td><a href="/article/show/{{$article->id}}">{{$article->title}}</a></td>
                            <td>
                                <a href="{{route('categoryShow', ['category' => $article->category->id])}}" class="font-p btn-toolset">
                                    @if(session('locale')=='en')
                                    {{$article->category->nameEN}}
                                    @elseif(session('locale')=='es')
                                    {{$article->category->nameES}}
                                    @else
                                     {{$article->category->name}}
                                    @endif
                                </a>
                            </td>
                            <td>{{$article->created_at}}</td>
                            @if($article->is_accepted == "1")
                                <td>{{__('ui.revisor-state-ok')}}</td>
                                <td>
                                    <form action="{{route('revisor.reject_article', compact('article'))}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger shadow">{{__('ui.revisor-button-x')}}</button>
                                    </form>
                                </td>
                            @elseif($article->is_accepted == "0")
                                <td>{{__('ui.revisor-state-x')}}</td>
                                <td>                
                                    <form action="{{route('revisor.accept_article', compact('article') )}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success shadow">{{__('ui.revisor-button-ok')}}</button>
                                    </form>
                                </td>
                            @else
                                <td>Da revisionare</td>
                                <td>
                                    <form action="{{route('revisor.index')}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning shadow">{{__('ui.n-d-2')}}</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>





</x-layout>