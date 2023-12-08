<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->datetime("start")->nullable();
            $table->datetime("end")->nullable();
            $table->foreignId("employee_id")->nullable()->constrained("employees");
            $table->foreignId("test_type_id")->nullable()->constrained("test_types");
            $table->integer("degree")->nullable();
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
        Schema::dropIfExists('tests');
    }
}
