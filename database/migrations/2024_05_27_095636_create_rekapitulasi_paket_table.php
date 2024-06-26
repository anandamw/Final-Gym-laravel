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
            $table->id();
            $table->foreignId('customers_id')->constrained();
            $table->date('tanggal')->now();
            $table->timestamps();

            // $table->unique(['customers_id', 'tanggal']);
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
