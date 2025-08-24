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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolaborator_id')
                ->constrained('users')
                ->onUpdate('cascade');
            $table->string('nama_event');
            $table->text('deskripsi_event');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->integer('harga');
            $table->text('lokasi');
            $table->text('maps')->nullable();
            $table->text('link_zoom')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('kuota');
            $table->enum('status', ['offline', 'online']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
