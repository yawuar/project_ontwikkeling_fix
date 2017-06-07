<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;
use Auth;

use App\User;
use App\Article;
use App\Gate15;
use App\Atypical_Location;

class cmsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    public function cmsIndex() {
        //future:
        //als je niet bent ingelogd: naar /login sturen.
        return view('cms/index');
    }

//articles
    public function gate15Articles(){
        if (!$this->checkPermission(2)) { return redirect('/cms'); }

        $articleUriPrefix = "gate15/";
        $articles = Gate15::where('is_deleted', 0)->get();

        return view('cms/articles', compact('articles', 'articleUriPrefix'));
    }

    public function getOneGate15Article($id){
        if (!$this->checkPermission(2)) { return redirect('/cms'); }

        $article = Gate15::find($id);

        return view('cms/gate15-articledetail', compact('article'));
    }

    public function getArticles(){
        if (!$this->checkPermission(1)) { return redirect('/cms'); }

        $articleUriPrefix = "";
        $articles = Article::get();

        return view('cms/articles', compact('articles', 'articleUriPrefix'));
    }

    public function getOneArticle($id){
        if (!$this->checkPermission(1)) { return redirect('/cms'); }

        if ($id == "new") {
            return view('cms/articledetail');
        } else {
            $article = Article::find($id);
            return view('cms/articledetail', compact('article'));
        }
    }

//article
    public function articlePost(Request $request){
        if (!$this->checkPermission(1)) { return redirect('/cms'); }

        if ($request->postId == 'new') {
            $article = new Article;
            $article->published_on = date(DATE_ATOM);
        } else {
            $article = Article::find($request->postId);
        }

        if (!$request->title || !$request->content) {
            return redirect()->back()->withInput(); //future: return and don't empty entire form
        }

        //image
        if ($request->file('image')) {
            $file = $request->file('image');
            $destinationPath = 'images';
            $imageTitle = time() . $file->getClientOriginalName();
            $file->move($destinationPath,$imageTitle);

            $article->picture_url = $destinationPath . '/' . $imageTitle;
        }

        $article->user_id = 1;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->is_testimonial = 0;
        if ($article->is_accepted == 0) {
            $article->is_accepted = 0;
        } else {
            $article->is_accepted = 1;
        }
        $article->save();

        return redirect(url('/cms/articles'));
    }

    public function articleDelete(Request $request){
        if (!$this->checkPermission(2)) { return redirect('/cms'); }

        $article = Article::find($request->postId);
        $article->delete();

        return redirect(url('/cms/articles'));
    }

    public function gate15ArticleDelete(Request $request){
        if (!$this->checkPermission(2)) { return redirect(url('/cms')); }

        $article = Gate15::find($request->postId);

        if ($article->is_accepted) {$article->is_accepted = false;}
        $article->is_deleted = 1;
        $article->save();

        return redirect(url('/cms/articles/gate15'));
    }

    public function articleToggleAccept(Request $request){
        if (!$this->checkPermission(2)) { return redirect('/cms'); }

        $uriAffix = "";

        if ($request->gate15) {
            $uriAffix = "gate15/";
            $article = Gate15::find($request->postId);
        } else {
            $article = Article::find($request->postId);
        }

        if ($article->is_accepted) {
            $article->is_accepted = false;
        } else {
            $article->is_accepted = true;
            $article->published_on = date(DATE_ATOM);
        }
        $article->save();


        return redirect(url('/cms/articles/' . 'editor/' . $uriAffix . $article->id));
    }

//homepage
    public function homepage(){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        //introtekst
        $file = 'config/webpagesContent.json';
        $content = json_decode(file_get_contents($file), false);
        $introtekst = $content->homepageIntroTekst;
        $tagline = $content->homepageTagline;

        return view('cms/homepage', compact('introtekst', 'tagline'));
    }

    public function homepageIntrotekstPost(Request $request){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $file = 'config/webpagesContent.json';
        $content = json_decode(file_get_contents($file), false);

        $content->homepageIntroTekst = $request->introtekst;

        file_put_contents($file, json_encode($content));

        return redirect(url('/cms/homepage'));
    }

    public function homepageTaglinePost(Request $request){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $file = 'config/webpagesContent.json';
        $content = json_decode(file_get_contents($file), false);

        $content->homepageTagline = $request->tagline;

        file_put_contents($file, json_encode($content));

        return redirect(url('/cms/homepage'));
    }

//stad
    public function stad(){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        //introtekst
        $file = 'config/webpagesContent.json';
        $content = json_decode(file_get_contents($file), false);
        $introtekst = $content->stadIntroTekst;

        //atypische locaties
        $locations = Atypical_Location::get();

        return view('cms/stad', compact('locations', 'introtekst'));
    }

    public function stadIntrotekstPost(Request $request){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $file = 'config/webpagesContent.json';
        $content = json_decode(file_get_contents($file), false);

        $content->stadIntroTekst = $request->introtekst;

        file_put_contents($file, json_encode($content));

        return redirect(url('/cms/stad'));
    }

    public function getOneLocation($id){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        if ($id == "new") {
            return view('cms/locationdetail');
        } else {
            $location = Atypical_Location::find($id);
            return view('cms/locationdetail', compact('location'));
        }
    }

    public function locationPost(Request $request){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        if ($request->locationId == 'new') {
            $location = new Atypical_Location;
        } else {
            $location = Atypical_Location::find($request->locationId);
        }

        if (!$request->name || !$request->content) {
            return redirect()->back()->withInput(); //future: return and don't empty entire form
        }

        //image
        if ($request->file('image')) {
            $file = $request->file('image');
            $destinationPath = 'images';
            $imageTitle = time() . $file->getClientOriginalName();
            $file->move($destinationPath,$imageTitle);

            $location->picture_url = $destinationPath . '/' . $imageTitle;
        }

        $location->site_url = $request->site_url;

        $location->name = $request->name;
        $location->content = $request->content;
        $location->save();

        return redirect(url('/cms/stad'));
    }

    public function locationDelete(Request $request){
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $location = Atypical_Location::find($request->locationId);
        $location->delete();

        return redirect(url('/cms/stad'));
    }

    //user role change
    public function getUsers() {
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $users = User::all();
        $addingUser = false;

        return view('/cms/gebruikers', compact('users', 'addingUser'));
    }

    public function getUsersNew() {
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        $users = User::all();
        $addingUser = true;

        return view('/cms/gebruikers', compact('users', 'addingUser'));
    }

    public function changeUserPermissions(Request $request) {
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        //future: maybe warn/deny if you are trying to change your own permissions?
        //--> errormessage = "Je kan niet je eigen permissions aanpassen" // compact('errormessage') // in blade: checken op errormessage en weergeven
        $data = $request->all();
        $user = User::find($data['user_id']);
        $user->user_role = $data['permissions'];
        $user->save();
        return redirect(url('/cms/gebruikers'));
    }

    public function addNewUser(Request $data) {
        if (!$this->checkPermission(3)) { return redirect('/cms'); }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_role' => $data['user_role']
        ]);

        return redirect(url('/cms/gebruikers'));
    }

    //check if the user has permission to access a webpage
    public function checkPermission($neededPermission) {
        if (Auth::guest()) {return false;}

        $user = Auth::user();
        $user_role = (int)$user->user_role;

        if($user_role >= $neededPermission) {
            return true;
        } else {
            return false;
        }
    }

}
