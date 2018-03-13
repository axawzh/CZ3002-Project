<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFreeJoinToGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // false - need leader permission, true - free join
        Schema::table('group', function(Blueprint $table) {
            $table->boolean('isFreeJoin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('group', function (Blueprint $table) {
            $table->dropColumn('isFreeJoin');
        });
    }
}
