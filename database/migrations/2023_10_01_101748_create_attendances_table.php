<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->nullable()->constrained("students");
            $table->foreignId("employee_id")->nullable()->constrained("employees");
            $table->foreignId("other_employee_id")->nullable()->constrained("employees");
            $table->boolean("type")->default(0); //1 for employee attendance 0 for student
            $table->boolean("attend")->default(0); //1 if employee or student attend 0 if absent
            $table->foreignId("session_id")->nullable()->constrained("sessions");
            $table->boolean("same_employee")->default(1);
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
        Schema::dropIfExists('attendances');
    }
}
