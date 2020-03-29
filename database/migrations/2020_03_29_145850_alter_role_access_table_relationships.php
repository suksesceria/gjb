<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoleAccessTableRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_access', function (Blueprint $table) {
            $table->foreign('role_id')->references('role_id')->on('role')
                ->onDelete('CASCADE');
            $table->foreign('menu_id')->references('menu_id')->on('menus')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_access', function (Blueprint $table) {
            $table->dropForeign('role_access_role_id_foreign');
            $table->dropForeign('role_access_menu_id_foreign');
        });
    }
}
