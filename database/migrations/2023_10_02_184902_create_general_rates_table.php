<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->nullable()->constrained("employees");
            $table->foreignId("student_id")->nullable()->constrained("students");
            $table->json("rates")->nullable();
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
        Schema::dropIfExists('general_rates');
    }
}
