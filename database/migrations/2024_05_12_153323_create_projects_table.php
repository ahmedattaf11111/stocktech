<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("client")->nullable();
            $table->text("description")->nullable();
            $table->foreignId("category_id")->nullable()->constrained("project_categories");
            $table->string("designer")->nullable();
            $table->json("images")->nullable();
            $table->string("section_one_title")->nullable();
            $table->text("section_one_content")->nullable();
            $table->string("section_tow_title")->nullable();
            $table->text("section_tow_content")->nullable();
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
        Schema::dropIfExists('projects');
    }
}
