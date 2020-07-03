<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSubstepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_substep', function (Blueprint $table) {
            $table->bigIncrements('project_substep_id');
            $table->unsignedBigInteger('project_step_id');
            $table->unsignedBigInteger('project_id')->nullable(false);
            $table->string('project_substep_name', 100)->nullable(false);
            $table->date('estimated_start_date');
            $table->date('estimated_end_date');
            $table->date('real_start_date')->nullable(true);
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_substep');
    }
}
