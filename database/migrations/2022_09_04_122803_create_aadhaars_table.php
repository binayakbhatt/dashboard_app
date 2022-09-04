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
        Schema::create('aadhaars', function (Blueprint $table) {
            $table->id();
            $table->string('station_id',5);
            $table->string('centre_name', 255);
            $table->string('division', 255);
            $table->string('operator', 255);
            $table->date('date');
            $table->string('centre_type');
            $table->int('enrolment');
            $table->int('update');
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
        Schema::dropIfExists('aadhaars');
    }
};
