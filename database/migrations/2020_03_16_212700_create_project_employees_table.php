<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_employees', function (Blueprint $table) {
            $table->bigIncrements('project_employee_id');
            $table->unsignedBigInteger('project_id')->nullable(false);
            $table->unsignedBigInteger('employee_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('project_id')->on('project')
                ->onDelete('RESTRICT');
            $table->foreign('employee_id')->references('employee_id')->on('employees')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_employees');
    }
}
