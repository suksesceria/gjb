<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialUseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_use', function (Blueprint $table) {
            $table->bigIncrements('material_use_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('material_report_id');
            $table->date('material_use_date');
            $table->unsignedInteger('stock');
            $table->double('material_cost_unit');
            $table->unsignedInteger('material_qty');
            $table->double('total');
            $table->unsignedInteger('residue');
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
            $table->foreign('material_report_id')->references('material_report_id')->on('material_report')
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
        Schema::dropIfExists('material_use');
    }
}
