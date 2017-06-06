<?php

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

use App\Article;

// page routes
Route::get('/', ['uses' => 'HomeController@index']);

Route::get('/city', ['uses' => 'PageController@city']);

Route::get('/events', ['uses' => 'EventsController@index']);
Route::get('/events/{name}', ['uses' => 'EventsController@show']);
Route::get('/events/random/event', ['uses' => 'EventsController@showRandomEvent']);
Route::get('/events/filter/{type}', ['uses' => 'EventsController@getDataByType']);

Route::get('/studeren', ['uses' => 'SchoolController@index']);
Route::get('/studeren/randomStudy', ['uses' => 'SchoolController@showRandomStudy']);
Route::get('/studeren/{name}', ['uses' => 'SchoolController@show']);
Route::get('/studeren/{name}/{id}', ['uses' => 'SchoolController@showStudies']);
Route::get('/studeren/heart/session/{name}', ['uses' => 'SchoolController@keepInSession']);
Route::get('/studeren/heart/session/{name}/remove', ['uses' => 'SchoolController@removeItemFromSession']);
Route::get('/studeren/heart/session/course/{name}', ['uses' => 'SchoolController@keepInCourseSession']);
Route::get('/studeren/heart/session/course/{name}/remove', ['uses' => 'SchoolController@removeFromCourseSession']);


Route::get('/testimonials', ['uses' => 'TestimonialController@index']);
Route::get('/testimonials/article/{id}', ['uses' => 'TestimonialController@show']);
Route::get('/testimonials/randomTestimonial', ['uses' => 'TestimonialController@showArticle']);
Route::get('/testimonials/filter/{type}', ['uses' => 'TestimonialController@getDataByType']);

// Only routes which are authenticated can be used
Route::group(['middleware' => 'auth'], function() {
  Route::get('/dashboard', ['uses' => 'DashboardController@index']);
  Route::post('/dashboard/change', ['uses' => 'DashboardController@change']);
});

Route::get('/articles', function () {

    $articles = Article::get();

    return view('articles', compact('articles'));
});
Route::get('/articles/{article}', ['uses' => 'ArticleController@detail']);
//Auth::routes();

Route::get('/home', 'PageController@home');

//CMS Routes
Route::get('/cms', function() {

    return view('cms/index');
});

Route::get('/cms/articles', function() {

    $articles = Article::get();

    return view('cms/articles', compact('articles'));
});

Route::get('/cms/articles/{id}', function ($id) {
    if ($id == "new") {
        return view('cms/articledetail');
    } else {
        $article = Article::find($id);

        return view('cms/articledetail', compact('article'));
    }
});



//POST & GET Routes
Route::post('/post-article', 'Controller@postArticle');

// Route fot authentication
Auth::routes();

Route::get('/logout' , 'Auth\LoginController@logout');
