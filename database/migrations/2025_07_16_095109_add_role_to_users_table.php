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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable()->after('password'); // Adding role column with default value 'user'
            $table->text('deskripsi')->nullable()->after('role'); // Adding deskripsi column
            $table->text('alamat')->nullable()->after('deskripsi'); // Adding deskripsi column
            $table->string('no_telp')->nullable()->after('alamat'); // Adding deskripsi column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
