<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rtn_bags', function (Blueprint $table) {
            $table->integer('bags_received')->default(0)->after('office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rtn_bags', function (Blueprint $table) {
            $table->dropColumn('bags_received');
        });
    }
};
