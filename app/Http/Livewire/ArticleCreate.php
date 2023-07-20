<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleCreateRequest;

class ArticleCreate extends Component
{
    use WithFileUploads;
    

    public $title, $category, $condition, $description, $price, $message, $temporary_images, $image, $forma_id, $article;
    public $images = [];

    protected $rules = [
        'title' => 'required|min:4',
        'condition' => 'required',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'description' => 'required|min:10',
        'price' => 'required|numeric|digits_between:1,15',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',  

    ];

    protected $messages = [
        '*.required' => 'Questo campo è obbligatorio ',
        'category.required' => 'Questo campo è obbligatorio ',
        '*.min' => 'Il campo :attribute è troppo corto',
        '*.numeric' => 'Il campo :attribute deve essere un numero',
        'temporary_images.required' => 'Inserisci l\'immagine',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'Le immagini devono essere al massimo di 1mb',
        'images.image' => 'Il file deve essere un\'immagine', 
        'images.max' => 'L\'immagine deve essere al massimo di 1mb',
        'price.digits_between' => 'Il prezzo deve essere di massimo 15 cifre'

    ];

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();

        /* $this->article = Category::find($this->category)->articles()->create($this->validate()); */
     
        $category= Category::find($this->category);
        $article = $category->articles()->create([
            'title' => $this->title,
            'condition' => $this->condition,
            'description' =>$this->description,
            'price' => $this->price,
        ]);

        if(count($this->images)){
            foreach($this->images as $image){
                /* $article->images()->create(['path' => $image->store('images' , 'public')]); */
                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create(['path' => $image->store($newFileName , 'public')]);

                RemoveFaces::withChain([
                    (new ResizeImage($newImage->path , 400, 300)),
                    (new GoogleVisionSafeSearch($newImage->id)),
                    (new GoogleVisionLabelImage($newImage->id)),
                ])->dispatch($newImage->id);

            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        $article->user()->associate(Auth::user());
        $article->save();
       
        session()->flash('successMessage', 'Annuncio creato con successo!');
        $this->reset();
    }

    public function render()
    {
        
        return view('livewire.article-create');
    }

    public function updateTemporaryImage(){
        if($this->validate(['temporary_images.*' => 'image|max:1024',])){
            foreach($this->temporary_images as $image){
                $this -> images[]=$image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

}
