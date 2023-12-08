<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_traces', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->nullable()->constrained("employees");
            $table->foreignId("student_id")->nullable()->constrained("students");
            $table->foreignId("session_id")->nullable()->constrained("sessions");
            $table->integer("pages_no")->nullable();
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
        Schema::dropIfExists('session_traces');
    }
}
