<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->text("banner_content")->nullable();
            $table->string("banner_main_title")->nullable();
            $table->string("banner_first_title")->nullable();
            $table->string("banner_second_title")->nullable();
            $table->string("banner_image")->nullable();

            $table->string("intro_main_title")->nullable();
            $table->string("intro_second_title")->nullable();
            $table->text("intro_content")->nullable();
            $table->string("intro_one_number")->nullable();
            $table->string("intro_one_text")->nullable();
            $table->string("intro_tow_number")->nullable();
            $table->string("intro_tow_text")->nullable();
            $table->string("intro_video")->nullable();
            $table->string("intro_image")->nullable();
            $table->string("review_image")->nullable();

            $table->string("adv_text")->nullable();
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
        Schema::dropIfExists('homes');
    }
}
