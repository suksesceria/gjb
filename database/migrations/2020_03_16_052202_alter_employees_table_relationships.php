<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeesTableRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('role_id')->references('role_id')->on('role')
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
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_role_id_foreign');
            $table->dropForeign('employees_created_by_foreign');
            $table->dropForeign('employees_updated_by_foreign');
        });
    }
}
