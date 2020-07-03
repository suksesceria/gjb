<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectProgressPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_progress_plan', function (Blueprint $table) {
            $table->bigIncrements('project_progress_plan_id');
            $table->unsignedBigInteger('project_substep_id');
            $table->unsignedBigInteger('project_step_id');
            $table->unsignedBigInteger('project_id')->nullable(false);
            $table->unsignedInteger('week');
            $table->double('weight');
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->string('desc', 300)->nullable();
            $table->unsignedInteger('ver')->nullable(false);
            $table->boolean('delete')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('project_id')->on('project')
                ->onDelete('RESTRICT');
            $table->foreign('project_step_id')->references('project_step_id')->on('project_step')
                ->onDelete('RESTRICT');
            $table->foreign('project_substep_id')->references('project_substep_id')->on('project_substep')
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
        Schema::dropIfExists('project_progress_plan');
    }
}
