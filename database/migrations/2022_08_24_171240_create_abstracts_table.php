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
        Schema::create('abstracts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('set_id')->constrained();
            $table->foreignId('office_id')->constrained();
            $table->integer('opening_balance')->nullable();
            $table->integer('bag_received')->nullable();
            $table->integer('bag_opened')->nullable();
            $table->integer('bag_closed')->nullable();
            $table->integer('bag_dispatched')->nullable();
            $table->integer('bag_transferred')->nullable();
            $table->integer('article_received')->nullable();
            $table->integer('article_closed')->nullable();
            $table->integer('article_pending')->nullable();
            $table->integer('customs_examination')->nullable();
            $table->integer('customs_clearance')->nullable();
            $table->integer('customs_pending')->nullable();
            $table->integer('sa_WS')->comment('SA working strength')->nullable();
            $table->integer('mts_WS')->comment('MTS working strength')->nullable();
            $table->integer('dwl_WS')->comment('DWL working strength')->nullable();
            $table->string('manpower')->comment('Productivity of Man Power as per Est norms achieved')->nullable();
            $table->string('logbook')->comment('RTN/MMS logbook properly maintained')->nullable();
            $table->string('rtn')->comment('RTN/MMS ontime arrival & departure')->nullable();
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
