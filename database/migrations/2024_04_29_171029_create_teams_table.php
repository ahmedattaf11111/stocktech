<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string("job")->nullable();
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->string("first_link")->nullable();
            $table->string("second_link")->nullable();
            $table->string("third_link")->nullable();
            $table->string("skill_one")->nullable();
            $table->string("skill_one_rate")->nullable();
            $table->string("skill_tow")->nullable();
            $table->string("skill_tow_rate")->nullable();
            $table->string("skill_three")->nullable();
            $table->string("skill_three_rate")->nullable();
            $table->string("experience_one")->nullable();
            $table->string("experience_one_duration")->nullable();
            $table->string("experience_tow")->nullable();
            $table->string("experience_tow_duration")->nullable();
            $table->string("experience_three")->nullable();
            $table->string("experience_three_duration")->nullable();
            $table->string("experience_four")->nullable();
            $table->string("experience_four_duration")->nullable();
            $table->text("about")->nullable();
            $table->text("skill_content")->nullable();
            $table->text("experience_content")->nullable();
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
        Schema::dropIfExists('teams');
    }
}
