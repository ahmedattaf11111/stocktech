<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->string("phone")->nullable();
            $table->boolean("status")->default(0);
            $table->foreignId("media_manager_id")->nullable()->constrained("media_managers");
            $table->foreignId("birth_id")->nullable()->constrained("media_managers");
            $table->foreignId("national_id")->nullable()->constrained("media_managers");
            $table->foreignId("level_id")->nullable()->constrained("levels");
            $table->foreignId("guardian_id")->nullable()->constrained("guardians");
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
        Schema::dropIfExists('students');
    }
}
