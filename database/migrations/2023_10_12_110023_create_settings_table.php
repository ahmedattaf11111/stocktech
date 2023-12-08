<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("footer_about_us")->nullable();
            //Body
            $table->string("employee_body")->nullable();
            $table->string("supervisor_body")->nullable();
            $table->string("blog_body")->nullable();
            $table->string("event_body")->nullable();
            //Contact
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("map_position")->nullable();
            //Social
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("youtube")->nullable();
            $table->string("instgram")->nullable();
            $table->string("snapchat")->nullable();
            $table->string("linkedin")->nullable();
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
        Schema::dropIfExists('settings');
    }
}
