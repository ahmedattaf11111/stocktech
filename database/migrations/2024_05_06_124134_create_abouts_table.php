<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string("service_title")->nullable();
            $table->string("service_content")->nullable();
            $table->string("experience_one")->nullable();
            $table->string("experience_one_rate")->nullable();
            $table->string("experience_tow")->nullable();
            $table->string("experience_tow_rate")->nullable();
            $table->text("experience_main_content")->nullable();
            $table->text("experience_second_content")->nullable();
            $table->string("experience_number")->nullable();
            $table->string("experience_number_text")->nullable();
            $table->string("author_about")->nullable();
            $table->string("author_note")->nullable();
            $table->json("images")->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
