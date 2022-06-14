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
        Schema::create('parameter_penilaian', function (Blueprint $table) {
            $table->id('id_parameter_penilaian');
            $table->integer('unit_kerja_id');
            $table->integer('jabatan_id');
            $table->integer('tema_bakat_id');
            $table->string('kategori_factor', 75);
            $table->string('nilai', 75);
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
        Schema::dropIfExists('parameter_jabatan');
    }
};
