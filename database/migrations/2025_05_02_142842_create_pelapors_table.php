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
        Schema::create('pelapors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('whatsapp');
            $table->integer('umur');
            $table->enum('gender',['Laki-Laki', 'Perempuan']);
            $table->boolean('is_penumpang')->nullable();
            $table->string('maskapai')->nullable();
            $table->string('no_penerbangan')->nullable();
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelapors');
    }
};
