<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = DB::table("users")->first(); 
        $category = DB::table("categories")->first();
        
        DB::table('posts')->insert([
                "user_id" => $user->id,
                "category_id" => $category->id,
                'title' => '全部かけて',
                'body' => 'Go!',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
    }
}
