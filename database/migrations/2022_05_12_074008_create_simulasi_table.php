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
        Schema::create('simulasi', function (Blueprint $table) {
            $table->id('id_simulasi');
            $table->bigInteger('user_id');
            $table->bigInteger('pernyataan_id');
            $table->integer('nilai');
            $table->integer('bobot_nilai');
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
        Schema::dropIfExists('simulasi');
    }
};
