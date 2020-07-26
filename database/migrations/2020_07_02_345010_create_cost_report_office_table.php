<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostReportOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_report_office', function (Blueprint $table) {
            $table->bigIncrements('cost_report_office_id');
            $table->unsignedBigInteger('project_id');
            $table->double('cost_expense');
            $table->double('balance');
            $table->boolean('cost_report_cashflow');
            $table->text('cost_report_office_desc');
            $table->date('cost_report_office_date');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('verify_by_admin')->nullable();
            $table->timestamps('verify_at_admin');
            $table->unsignedBigInteger('status')->nullable();
            $table->string('desc', 300)->nullable();
            $table->unsignedInteger('ver')->nullable(false);
            $table->boolean('delete')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('project_id')->on('project')
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
        Schema::dropIfExists('cost_report_office');
    }
}
