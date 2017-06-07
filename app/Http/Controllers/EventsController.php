<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gate15Event;
use Response;

class EventsController extends Controller
{
  public function index() {
    $events = Gate15Event::orderBy('event_begin_date', 'DESC')->get();
    $uniqueTags = Gate15Event::select('event_type')->distinct()->get();
    return view('events.index', compact('events', 'uniqueTags'));
  }

  public function show($name) {
    $eventName = str_replace('_', ' ', $name);
    $event = Gate15Event::where('title', $eventName)->get()->first();
    return view('events.show', compact('event'));
  }

  public function showRandomEvent() {
    $event = Gate15Event::get()->random(1)->first();
    $eventName = strtolower(str_replace(' ', '_', $event['title']));
    return redirect(url('events/' . $eventName));
  }

  public function getDataByType($type) {
    $eventsByTag;
    if($type === 'all') {
      $eventsByTag = Gate15Event::get();
    } else {
      $typeName = str_replace('_', ' ', $type);
      $eventsByTag = Gate15Event::where('event_type', $typeName)->get();
    }
    return Response::json($eventsByTag);
  }
}
