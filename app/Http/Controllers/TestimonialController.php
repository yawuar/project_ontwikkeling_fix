<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gate15;
use Response;
use App\Article;

class TestimonialController extends Controller
{
  // var to check is article is accepted
  public $is_accepted = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $uniqueTags = Gate15::select('tags')->where('is_accepted', $this->is_accepted)->distinct()->get();
      $gate15articles = Gate15::select('*')->where('is_accepted', $this->is_accepted)->get();
      $ourArticles = Article::select('*')->where('is_accepted', $this->is_accepted)->get();

      $articles = [];
      foreach($gate15articles as $object) {
        array_push($articles, $object);
      }
      foreach($ourArticles as $object) {
        array_push($articles, $object);
      }

      $articles = array_values(array_sort($articles, function ($value) {
        return $value['published_on'];
      }));

      $articles = array_reverse($articles);

      return view('testimonials.index', compact('articles', 'uniqueTags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id, Request $request)
    {
      $testimonial = Gate15::find($id);
      $test = $request->path();
      return view('testimonials.detail', compact('testimonial', 'test'));
    }

    public function showArticle() {
      $testimonial = Gate15::where('is_accepted', 1)->get()->random(1)->first();
      return redirect('testimonials/article/' . $testimonial['id']);
    }

    public function getDataByType($type) {
      $typeName = str_replace('-', ' ', $type);
      if($type === "geen-tag") {
        $eventsByTag = Gate15::where('tags', "")->where('is_accepted', $this->is_accepted)->get();
      } else if($type === 'all') {
        $eventsByTag = Gate15::where('is_accepted', $this->is_accepted)->get();
      } else {
        $eventsByTag = Gate15::where('tags', $typeName)->where('is_accepted', $this->is_accepted)->get();
      }
      return Response::json($eventsByTag);
    }
}
