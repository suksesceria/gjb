<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('employee_id');
            $table->string('employee_name', 100)->nullable(false);
            $table->date('employee_dob')->nullable(false);
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->string('employee_username', 100)->nullable(false);
            $table->string('employee_password', 255)->nullable(false);
            $table->string('employee_email', 100)->nullable(false);
            $table->string('employee_phone', 15)->nullable(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('desc', 300)->nullable();
            $table->unsignedInteger('ver')->nullable(false);
            $table->boolean('delete')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['employee_username', 'deleted_at']);
            $table->unique(['employee_email', 'deleted_at']);
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
