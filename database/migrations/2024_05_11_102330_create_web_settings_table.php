<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string("app_name_ar")->nullable();
            $table->string("app_name_en")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("contact_title")->nullable();
            $table->text("contact_content")->nullable();
            $table->text("privacy_policy")->nullable();
            $table->text("term_and_condition")->nullable();

            $table->string("white_logo")->nullable();
            $table->string("black_logo")->nullable();

            $table->string("facebook")->nullable();
            $table->string("behance")->nullable();
            $table->string("instgram")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("youtube")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("snapchat")->nullable();
            $table->string("tiktok")->nullable();
            $table->string("twitter")->nullable();

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
        Schema::dropIfExists('web_settings');
    }
}
