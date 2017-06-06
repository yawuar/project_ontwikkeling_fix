<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;

//models
use App\Article;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function postArticle(Request $request){
        //return $request;

        $article = new Article;
        $article->user_id = 1;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->picture_url = "";
        $article->is_testimonial = 0;
        $article->is_accepted = 0;
        //return $article;
        $article->save();

        return redirect('/cms/articles');
    }

}
