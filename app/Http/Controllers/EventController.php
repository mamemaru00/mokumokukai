<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\category;
use Illuminate\Support\Facades\DB;

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

    /**
     * もくもく会登録処理
     */
    public function create(Request $request)
    {
        try{
             // トランザクション開始
             DB::beginTransaction();
             // リクエストされたデータをもとにeventsテーブルにデータをinsert
             $insertEvent = $this->event->insertEventData($request);
             // 処理に成功したらコミット
             DB::commit();
        }catch(\Throwable $e){
            // 処理に失敗したらロールバック
            DB::rollback();
            // 例外を投げる
            throw $e;
        }
        
        return redirect()->route('event.index');
    }
}
