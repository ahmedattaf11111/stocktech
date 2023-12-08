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
            $table->string("main_header")->nullable();
            $table->string("second_header")->nullable();
            $table->string("small_header")->nullable();
            $table->string("first_body")->nullable();
            $table->string("second_body")->nullable();
            $table->string("point_one")->nullable();
            $table->string("point_tow")->nullable();
            $table->string("point_three")->nullable();
            $table->string("video_url")->nullable();
            $table->foreignId("media_manager_id")->nullable()->constrained("media_managers");
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
