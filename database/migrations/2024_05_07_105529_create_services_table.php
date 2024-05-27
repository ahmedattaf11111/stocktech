<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->json("images")->nullable();
            $table->text("description")->nullable();
            $table->string("detail_content")->nullable();
            $table->string("detail_point_one")->nullable();
            $table->string("detail_point_tow")->nullable();
            $table->string("detail_point_three")->nullable();
            $table->string("detail_point_four")->nullable();
            $table->string("detail_point_five")->nullable();
            $table->string("detail_point_six")->nullable();
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
        Schema::dropIfExists('services');
    }
}
