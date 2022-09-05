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
        Schema::create('mos', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('set_id')->constrained();
            $table->foreignId('office_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('bags_opening_balance')->nullable();
            $table->integer('bags_received')->nullable();
            $table->integer('bags_opened')->nullable();
            $table->integer('bags_closed')->nullable();
            $table->integer('bags_dispatched')->nullable();
            $table->integer('bags_transferred')->nullable();
            $table->integer('articles_received')->nullable();
            $table->integer('articles_closed')->nullable();
            $table->integer('articles_pending')->nullable();
            $table->integer('customs_examination')->nullable();
            $table->integer('customs_clearance')->nullable();
            $table->integer('customs_pending')->nullable();
            $table->integer('sa_WS')->comment('SA working strength')->nullable();
            $table->integer('mts_WS')->comment('MTS working strength')->nullable();
            $table->integer('dwl_WS')->comment('DWL working strength')->nullable();
            $table->boolean('manpower')->comment('Productivity of Man Power as per Est norms achieved')->nullable();
            $table->boolean('logbook')->comment('RTN/MMS logbook properly maintained')->nullable();
            $table->boolean('rtn')->comment('RTN/MMS ontime arrival & departure')->nullable();
            $table->string('remarks', 100)->nullable();
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
        Schema::dropIfExists('abstracts');
    }
};
