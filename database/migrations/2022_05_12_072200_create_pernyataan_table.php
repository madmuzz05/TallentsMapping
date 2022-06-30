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
        Schema::create('pernyataan', function (Blueprint $table) {
            $table->id('id_pernyataan');
            $table->string('pernyataan');
            $table->integer('tema_bakat_id');
            $table->double('bobot_nilai');
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
        Schema::dropIfExists('pernyataan');
    }
};
