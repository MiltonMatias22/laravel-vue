<?php

use App\Models\Article;
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

Route::get('/', function () {
    $articles = Article::getAllByDate(12);
    return view('welcome', compact('articles'));
});

Route::get('/article/{id}/{title?}', function ($id, $title = null) {
    $article = Article::find($id);
    if ($article) {
        return view('article', compact('article'));
    }
    return redirect()->route('/');
})->name('article');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:isAuthor');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(
    function(){
        Route::resource('articles','ArticlesController')->middleware('can:isAuthor');
        Route::resource('users','UsersController')->middleware('can:isAdmin');
        Route::resource('authors','AuthorsController')->middleware('can:isAdmin');
        Route::resource('admins','AdminsController')->middleware('can:isAdmin');
    }
);
