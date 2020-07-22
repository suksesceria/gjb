<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_report', function (Blueprint $table) {
            $table->bigIncrements('material_report_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('material_type_id');
            $table->unsignedBigInteger('material_unit_id');
            $table->string('material_code');
            $table->date('material_report_date');
            $table->string('material_name');
            $table->double('material_cost_unit');
            $table->unsignedInteger('material_qty');
            $table->text('material_desc');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('verify_by_admin')->nullable();
            $table->date('verify_at_admin')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->string('desc', 300)->nullable();
            $table->unsignedInteger('ver')->nullable(false);
            $table->boolean('delete')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('project_id')->on('project')
                ->onDelete('RESTRICT');
            $table->foreign('material_type_id')->references('material_type_id')->on('material_type')
                ->onDelete('RESTRICT');
            $table->foreign('material_unit_id')->references('material_unit_id')->on('material_unit')
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
        Schema::dropIfExists('material_report');
    }
}
