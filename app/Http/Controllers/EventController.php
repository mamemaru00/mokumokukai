<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\category;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();  
        $this->category = new Category();      
    }

    public function index()
    {
        // eventsテーブルにあるデータを全て取得
        $events = $this->event->allEventsData();

        return view('event.index', compact('events'));
    }

    /**
     * もくもく会登録画面
     */
    public function register()
    {
        $categories = $this->category->allCategoriesData(); // 追加
        return view('event.register', compact('categories')); // compact関数でビューにcategoriesを渡す
    }
}
