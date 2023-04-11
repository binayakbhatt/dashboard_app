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
        Schema::create('rtn_bags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rtn_log_id')->constrained();
            $table->foreignId('office_id')->constrained();
            $table->integer('bags_dispatched');
            $table->integer('bags_left');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rtn_bags');
    }
};
