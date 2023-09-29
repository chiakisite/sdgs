<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'name' => "貧困をなくそう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "飢餓をゼロに",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "すべての人に健康と福祉を",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "質の高い教育をみんなに",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "ジェンダー平等を実現しよう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
                 DB::table('categories')->insert([
                'name' => "安全な水とトイレを世界中に",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "エネルギーをみんなに そしてクリーンに",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "働きがいも 経済成長も",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "産業と技術革新の基盤をつくろう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "人や国の不平等をなくそう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "住み続けられるまちづくりを",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                 DB::table('categories')->insert([
                'name' => "つくる責任 つかう責任",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "気候変動に具体的な対策を",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "海の豊かさを守ろう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
                DB::table('categories')->insert([
                'name' => "陸の豊かさも守ろう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "平和と公正を すべての人に",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
                DB::table('categories')->insert([
                'name' => "パートナーシップで目標を達成しよう",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
    
}
