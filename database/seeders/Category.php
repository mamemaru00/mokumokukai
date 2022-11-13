<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'Laravel会',
            ], 
            [
                'category_id' => 2,
                'category_name' => 'Java会',
            ], 
            [
                'category_id' => 3,
                'category_name' => 'TypeScript会',
            ],    
        ]);

        
    }
}
