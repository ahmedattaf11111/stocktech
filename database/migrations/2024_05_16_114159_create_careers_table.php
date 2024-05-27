<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->foreignId("career_type_id")->nullable()->constrained("career_types");
            $table->foreignId("career_team_id")->nullable()->constrained("career_teams");
            $table->foreignId("location_id")->nullable()->constrained("locations");
            $table->text("description")->nullable();
            $table->text("requirment")->nullable();
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
        Schema::dropIfExists('careers');
    }
}
