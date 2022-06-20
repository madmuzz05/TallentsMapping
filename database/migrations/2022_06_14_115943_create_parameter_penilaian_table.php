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
            $table->bigInteger('job_family_id')->unique();
            $table->bigInteger('tema_bakat_id')->unique();
            $table->string('kategori_faktor', 75);
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
        Schema::dropIfExists('parameter_penilaian');
    }
};
