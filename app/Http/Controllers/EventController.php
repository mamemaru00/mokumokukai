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
        // Eloquentでeventsテーブルにあるデータを全て取得
        $events = Event::get();

        //　実務のレベルになると、記述量も増えて同じような記述をコントローラーに書くのはよくない
        $events = Event::select('event_id', 'title')
                                ->leftJoin('')
                                ->where('category_id', 1)
                                ->orderBy('category_id', 'ASC')
                                ->get();

        return view('event.index', compact('events'));
    }
}
