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
        Schema::create('komplains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelapor_id')->constrained();
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->ulid('tiket')->unique();
            $table->text('message');
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            $table->enum('tingkat',['Rendah', 'Sedang', 'Tinggi'])->default('Rendah');
            $table->string('bukti')->nullable();
            $table->string('bukti_penyelesaian')->nullalble();
            $table->char('deskripsi_penyelesaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komplains');
    }
};
