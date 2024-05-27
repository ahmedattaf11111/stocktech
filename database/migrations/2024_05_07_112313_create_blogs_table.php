<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("name_ar")->nullable();
            $table->string("image")->nullable();
            $table->string("first_image")->nullable();
            $table->text("content")->nullable();
            $table->text("content_ar")->nullable();
            $table->string("second_image")->nullable();
            $table->string("author_name")->nullable();
            $table->string("author_about")->nullable();
            $table->string("author_note")->nullable();
            $table->string("author_image")->nullable();
            
            $table->string("section_one_title")->nullable();
            $table->text("section_one_content")->nullable();
            
            $table->string("section_tow_title")->nullable();
            $table->text("section_tow_content")->nullable();
            
            $table->string("section_three_title")->nullable();
            $table->text("section_three_content")->nullable();
            $table->string("section_three_point_one")->nullable();
            $table->string("section_three_point_tow")->nullable();
            $table->string("section_three_point_three")->nullable();

            $table->string("section_four_title")->nullable();
            $table->text("section_four_content")->nullable();
            $table->string("section_four_point_one")->nullable();
            $table->string("section_four_point_tow")->nullable();
            $table->string("section_four_point_three")->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
