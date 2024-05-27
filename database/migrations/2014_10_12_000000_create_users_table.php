<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("type")->nullable();
            $table->boolean("status")->default(1)->nullable();
            $table->string("image")->nullable();
            $table->string("user_type")->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('technology')->nullable();
            $table->string('industry')->nullable();
            $table->string('cv')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('country_id')->nullable()->constrained("locations");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
