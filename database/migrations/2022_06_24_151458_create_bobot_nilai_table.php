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
        Schema::create('bobot_nilai', function (Blueprint $table) {
            $table->id("id_bobot_nilai");
            $table->bigInteger('simulasi_id');
            $table->bigInteger('user_id');
            $table->bigInteger('parameter_penilaian_id');
            $table->double('nilai');
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
        Schema::dropIfExists('bobot_nilai');
    }
};
