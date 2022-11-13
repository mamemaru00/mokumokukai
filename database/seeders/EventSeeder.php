<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
           [
                'event_id' => 1,
                'category_id' => 1,
                'title' => Str::random(10),
                'content' => Str::random(10),
                'entry_fee' => 1000,
           ], 
           [
                'event_id' => 2,
                'category_id' => 2,
                'title' => Str::random(10),
                'content' => Str::random(10),
                'entry_fee' => 3000,
            ], 
            [
                'event_id' => 3,
                'category_id' => 3,
                'title' => Str::random(10),
                'content' => Str::random(10),
                'entry_fee' => 5000,
            ], 
        ]);
    }
}
