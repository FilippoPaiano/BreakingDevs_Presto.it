<x-layout>

    <x-session-messages />
  

    
    <div class="container-fluid vh-100 background-custom">
     
        <div class="row h-100 align-items-center m-0  position-relative">
            <div class="col-12 col-lg-6 p-0">
                
            </div>
            <div class="col-12 col-lg-6 align-items-center p-0 smartphone">
                <img src="/media/Logo_presto_nero_thin.png" class="img-fluid logo-home mx-auto d-block">
                <h2 class="text-center mt-3 pt-5 font-s">{{__('ui.home-message')}}</h2>
                <h3 class="text-center font-s mt-3">{{__('ui.home-action')}} <a href="{{route('article.create')}}" class="btn btn-dark rounded-pill">{{__('ui.home-button')}}</a> </h3>
                <div class="row my-5">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-6 my-auto">
                                <form action="{{route('article.search')}}" method="GET" class="d-flex">
                                    <input type="search" name="searched" class="form-control me-2 rounded-pill"
                                        placeholder="{{__('ui.search-ph')}}" aria-label="Search">
                                    <button type="submit" class="bg-transparent border-0">
                                        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                        <lord-icon src="https://cdn.lordicon.com/rlizirgt.json" trigger="hover"
                                            style="width:25px;height:25px">
                                        </lord-icon>
                                    </button>
                                </form>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>








</x-layout>
