<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');
Route::post('/language/{lang}', [PublicController::class, 'setLocale'])->name('setLocale');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
Route::get('/condition', [PublicController::class, 'condition'])->name('condition');

Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/article/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');
Route::patch('/reject/article/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');
// Route::get('/null/article/', [RevisorController::class, 'nullArticle'])->middleware('isRevisor')->name('revisor.null_article');
Route::get('/revisor/edit', [RevisorController::class, 'revisorEdit'])->middleware('isRevisor')->name('revisor.edit');
Route::get('/request/revisor' , [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}' , [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');
Route::get('/revisor/details', [RevisorController::class, 'revisorDetails'])->middleware('auth')->name('revisor.details');



