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
            $table->foreignId('import_id')->constrained('imports');
            $table->foreignId('division_id')->constrained('divisions');
            $table->foreignId('pincode_id')->constrained('pincodes');
            $table->string('station_no');
            $table->string('centre_name', 255);
            $table->string('operator_name', 255);
            $table->date('transaction_date');
            $table->string('centre_type');
            $table->integer('enrolments');
            $table->integer('updates');
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
