<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skala_fuzzy', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skala');
            $table->float('nilai_min');
            $table->float('nilai_max');
            $table->float('nilai_mid');
            $table->bigInteger('criteria_id')->unsigned();
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skala_fuzzy');
    }
};
