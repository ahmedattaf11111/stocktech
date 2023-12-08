<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("job")->nullable();
            $table->integer("target")->nullable();
            $table->boolean("status")->default(0);
            $table->decimal("hour_price")->default(0);
            $table->foreignId("media_manager_id")->nullable()->constrained("media_managers");
            $table->foreignId("national_id")->nullable()->constrained("media_managers");
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("cv")->nullable();
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
        Schema::dropIfExists('employees');
    }
}
