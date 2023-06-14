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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tujuan');
            $table->string('checkpoint1');
            $table->dateTime('tanggal1');
            $table->string('checkpoint2');
            $table->dateTime('tanggal2');
            $table->string('checkpoint3');
            $table->dateTime('tanggal3');
            $table->string('checkpoint4');
            $table->dateTime('tanggal4');
            $table->string('checkpoint5');
            $table->dateTime('tanggal5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
