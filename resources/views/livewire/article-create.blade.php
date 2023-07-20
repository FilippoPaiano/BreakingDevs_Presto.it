<div class="pt-3">
    <x-session-messages />
    <form wire:submit.prevent="store" enctype="multipart/form-data" class="p-4 mb-5 rounded-5 w-75 mx-auto bg-dark">


        @csrf
        <div class="mb-3">
            <label for="title" class="tx-p font-p m-0 form-label">{{__('ui.insert-article-title')}}</label>
            <input type="text" wire:model="title" class="font-p form-control shadow @error('title') is-invalid @enderror" id="title">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="tx-p font-p m-0 form-label">{{__('ui.insert-article-category')}}</label><br>
            <select wire:model.defer="category" id="category"
                class="font-p form-control shadow @error('category') is-invalid @enderror">
                <option value="">{{__('ui.insert-article-category-ph')}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="tx-p font-p m-0 form-label">{{__('ui.insert-article-image')}}</label>
            <input wire:model="temporary_images" type="file" name="images" multiple class="font-p form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
            @error('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p>
            @enderror
        </div>

        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p class="tx-p font-p m-0"> {{__('ui.insert-article-preview')}}</p>
                    <div class="row border border-2 border-success rounded shadow mb-3">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <button type="button" class="font-p btn shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">
                                    <div class="img-preview align-items-center justify-content-center d-flex mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});">X</div>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        @endif
       

        <div class="mb-3">
            <label for="condition" class="tx-p font-p form-label m-0">{{__('ui.insert-article-condition')}}</label>
            <input type="text" wire:model="condition" class="font-p form-control shadow @error('condition') is-invalid @enderror"
                id="condition">
            @error('condition')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="tx-p font-p form-label m-0">{{__('ui.insert-article-price')}}</label>
            <input type="number" wire:model="price" class="font-p form-control shadow @error('price') is-invalid @enderror" id="price">
            @error('price')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="tx-p font-p form-label m-0">{{__('ui.insert-article-description')}}</label>
            <textarea wire:model="description" id="description" cols="30" rows="3"
                class="font-p form-control shadow @error('description') is-invalid @enderror"></textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row justify-content-center d-flex">
            <button type="submit" class=" font-p btn btn-success w-25 ">{{__('ui.insert-article-submit')}}</button>

        </div>
    </form>
</div>
