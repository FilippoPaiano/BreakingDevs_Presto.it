<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        $articles = Article::all();

        return view('revisor.index', compact('article_to_check', 'articles'));
    }

    public function acceptArticle(Article $article){
        $article->setAccepted(true);

        return redirect()->back()->with('message', 'Articolo accettato');
    }

    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        

        return redirect()->back()->with('message', 'Articolo rifiutato');
    }

    // public function nullArticle(){
        //     $article_checked = Article::where('is_accepted', true || false )->orderBy('created_at', 'DESC')->first();
        
        //     $article_checked->setNull();
        
        //     return view('revisor.index', ['article_to_check'=> $article_checked]);
        // }
        
        public function becomeRevisor(){
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
            return redirect()->back()->with('message' , 'Hai richiesto di diventare revisore correttamente'); 
        }
        
        public function makeRevisor(User $user){
            Artisan::call('presto:MakeUserRevisor' , ["email" => $user->email]);
            return redirect('/')->with('message' , 'L\'utente è diventato revisore'); 
        }
        
        public function revisorEdit(){

            $articles = Article::all()->sortByDesc('created_at');
    
            return view('revisor.edit', compact('articles'));
        }

        public function revisorDetails(){
            return view('revisor.details');
        }
    }
    