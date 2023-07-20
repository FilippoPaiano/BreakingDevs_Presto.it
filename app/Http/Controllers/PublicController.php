<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at','DESC')->take(6)->get();

        return view('welcome', compact('articles'));
    }

    public function categoryShow(Category $category){
       
        $articles = Article::where('is_accepted', true)->where('category_id','=',$category->id)->orderBy('created_at','DESC')->take(6)->get();
         

        return view('categoryShow', compact('category','articles'));
    }

    public function searchArticles(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted',true)->paginate(10);
        return view('article.index',compact('articles'));
    }

    public function condition(){
       
        return view('condition');
    }

    public function setLocale($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }



}
