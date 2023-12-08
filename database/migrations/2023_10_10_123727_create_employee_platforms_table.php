<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_platforms', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->text("description")->nullable();
            $table->boolean("status")->default(0);
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
        Schema::dropIfExists('employee_platforms');
    }
}
