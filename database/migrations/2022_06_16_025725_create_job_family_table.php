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
        Schema::create('job_family', function (Blueprint $table) {
            $table->id('id_job_family');
            $table->string('kode', 10)->unique();
            $table->string('job_family');
            $table->string('nilai_core_faktor')->nullable();
            $table->string('nilai_sec_faktor')->nullable();
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
        Schema::dropIfExists('job_family');
    }
};
