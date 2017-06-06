<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function detail(Article $article, Request $request) {
      $test = $request->path();
      return view('articles.detail', compact('article', 'test'));
    }
}
