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
// Route::group(['middleware' => 'auth'], function() {
//   Route::get('/dashboard', ['uses' => 'DashboardController@index']);
//   Route::post('/dashboard/change', ['uses' => 'DashboardController@change']);
// });

// Route fot authentication
Auth::routes();
Route::get('/logout' , 'Auth\LoginController@logout');

// routes Adriaan

//CMS Routes
Route::get('/cms', 'cmsController@cmsIndex');

//articles
Route::get('/cms/articles', 'cmsController@getArticles');
Route::get('/cms/articles/editor/{id}', 'cmsController@getOneArticle');
Route::get('/cms/articles/gate15', 'cmsController@gate15Articles');
Route::get('/cms/articles/editor/gate15/{id}', 'cmsController@getOneGate15Article');

Route::post('/cms/article-post', 'cmsController@articlePost');
Route::post('/cms/article-delete', 'cmsController@articleDelete');
Route::post('/cms/gate15-article-delete', 'cmsController@gate15ArticleDelete');
Route::post('/cms/article-toggle-accept', 'cmsController@articleToggleAccept');

//stad (intro & locations)
Route::get('cms/stad', 'cmsController@stad');
Route::get('/cms/location/editor/{id}', 'cmsController@getOneLocation');
Route::post('/cms/stad-introtekst', 'cmsController@stadIntrotekstPost');
Route::post('/cms/location-post', 'cmsController@locationPost');
Route::post('/cms/location-delete', 'cmsController@locationDelete');

//homepage
Route::get('/cms/homepage', 'cmsController@homepage');
Route::post('/cms/homepage-introtekst', 'cmsController@homepageIntrotekstPost');
Route::post('/cms/homepage-tagline', 'cmsController@homepageTaglinePost');

//gebruikers
Route::get('/cms/gebruikers','cmsController@getUsers');
Route::get('/cms/gebruikers/new','cmsController@getUsersNew');
Route::post('/cms/changeUserPermissions', 'cmsController@changeUserPermissions');
Route::post('/cms/addNewUser', 'cmsController@addNewUser');

// studeren
Route::get('/cms/studeren', 'StudyController@index');
Route::get('/cms/studeren/editor/{id}', 'StudyController@show');
Route::post('/cms/studeren/study-post', 'StudyController@store');
Route::delete('/cms/studeren/study-delete/{id}', 'StudyController@destroy');

//API voor game
Route::get('/posttest', function (Request $request) {
    if ($request->token == '7D9wC3K9Cjna0NGVOXJl') {
        return "OK";
        /*return response()->json([
            'name' => 'Adriaan',
            'state' => 'CA'
        ]);*/
    } else {
        return "INCORRECT TOKEN";
    }
});

Route::get('/api/login', 'restapiController@login');
Route::get('/api/register', 'restapiController@register');
Route::get('/api/send-score', 'restapiController@sendScore');
Route::get('/api/get-score', 'restapiController@getScore');