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
        Schema::create('rekapitulasi_pakets', function (Blueprint $table) {
            $table->id("rekapitulasi_id")->autoIncrement();

            $table->string('token_rekap');
            $table->foreignId('customers_id')->constrained();
            $table->date('tanggal')->now();
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
        Schema::dropIfExists('rekapitulasi_pakets');
    }
};
