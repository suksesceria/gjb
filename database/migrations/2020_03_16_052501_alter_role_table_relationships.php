<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoleTableRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role', function (Blueprint $table) {
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
        Schema::table('role', function (Blueprint $table) {
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
        });
    }
}
