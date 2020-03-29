<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_step', function (Blueprint $table) {
            $table->bigIncrements('project_step_id');
            $table->string('project_step_name', 100)->nullable(false);
            $table->unsignedBigInteger('project_id')->nullable(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('desc', 300)->nullable();
            $table->unsignedInteger('ver')->nullable(false);
            $table->boolean('delete')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('project_id')->on('project')
                ->onDelete('RESTRICT');
            $table->foreign('created_by')->references('employee_id')->on('employees')
                ->onDelete('RESTRICT');
            $table->foreign('updated_by')->references('employee_id')->on('employees')
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
        Schema::dropIfExists('project_step');
    }
}
