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
     * 詳細画面
     */
    public function show($id)
    {
        // $id(event_id)をもとに、eventsテーブルの特定のレコードに絞り込む
        $event = $this->event->findEventByEventId($id);

        // 指定の日付を△△/××に変換する
        $date = date("m/d" ,strtotime($event->date));
        //指定日の曜日を取得する
        $getWeek = date('w', strtotime($event->date));
        //配列を使用し、要素順に(日:0〜土:6)を設定する
        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];

        return view('event.show', compact(
            'event',
            'date',
            'getWeek',
            'week',
            'start_time',
            'end_time',
        ));
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
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()->route('event.index')->with('error', 'もくもく会の登録に失敗しました。');
        }

        return redirect()->route('event.index')->with('error', 'もくもく会の登録に成功しました。');
    }
}
