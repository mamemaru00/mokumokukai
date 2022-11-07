<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();        
    }

    public function index()
    {
        // eventsテーブルにあるデータを全て取得
        $events = $this->event->allEventsData();

        return view('event.index', compact('events'));
    }
}
