<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
		$table->id();
		$table->bigInteger('user_id')->unsigned(); 
		$table->foreignId('category_id')->constrained('categories');    
		$table->string('image_url');
		//$table->string('image_title',100);//追加
		$table->string('title', 32);
		$table->string('body', 2200);	
		$table->timestamps();
		$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
