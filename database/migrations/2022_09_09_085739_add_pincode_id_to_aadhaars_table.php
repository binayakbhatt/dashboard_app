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
        Schema::table('aadhaars', function (Blueprint $table) {
            $table->foreignId('pincode_id')->constrained('pincodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aadhaars', function (Blueprint $table) {
            $table->dropForeign(['pincode_id']);
            $table->dropColumn('pincode_id');
        });
    }
};
