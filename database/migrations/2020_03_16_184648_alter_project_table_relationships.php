<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectTableRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->foreign('project_type_id')->references('project_type_id')->on('project_types')
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
        Schema::table('project', function (Blueprint $table) {
            $table->dropForeign('project_project_type_id_foreign');
            $table->dropForeign('project_created_by_foreign');
            $table->dropForeign('project_updated_by_foreign');
        });
    }
}
