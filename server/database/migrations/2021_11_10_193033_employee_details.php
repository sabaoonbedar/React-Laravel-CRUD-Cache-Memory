<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('salarytype_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->string('first_name',70);
            $table->string('last_name',70);
            $table->string('phone',15)->nullable();
            $table->string('email',50)->unique()->index()->nullable();
            $table->float('work_hours');

            $table->integer('salary');


            $table->foreign('salarytype_id')->references('id')->on('salary_types');

            $table->foreign('department_id')->references('id')->on('departments');

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
        Schema::dropIfExists('employee_details');
    }
}
