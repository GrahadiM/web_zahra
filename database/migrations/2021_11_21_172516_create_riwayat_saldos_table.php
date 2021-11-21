<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_saldos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('saldoAfter');
            $table->string('saldoPlus');
            $table->string('saldoNow');
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
        Schema::dropIfExists('riwayat_saldos');
    }
}
