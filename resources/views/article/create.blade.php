<x-layout>

<x-header>
    {{__('ui.insert-title')}}
</x-header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 font-s">
            {{-- Form / Compo livewire --}}
            @livewire('article-create')
        </div>
    </div>
</div>


</x-layout>