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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onUpdate('cascade');
            $table->foreignId('id_kolaborator')->constrained('users')->onUpdate('cascade');
            $table->foreignId('id_event')->constrained('events')->onUpdate('cascade');
            $table->integer('bintang');
            $table->text('isi_review');
            $table->enum('status',['aktif','nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
