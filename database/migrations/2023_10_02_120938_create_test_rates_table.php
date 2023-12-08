<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->nullable()->constrained("employees");
            $table->foreignId("student_id")->nullable()->constrained("students");
            $table->foreignId("test_id")->nullable()->constrained("tests");
            $table->integer("rate")->nullable();
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
        Schema::dropIfExists('test_rates');
    }
}
