<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcarasTable extends Migration
{
    public function up(): void
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();

            // Relasi
            $table->foreignId('klien_id')->constrained('kliens')->onDelete('cascade');
            $table->foreignId('kategori_acara_id')->constrained('kategori_acaras')->onDelete('cascade');

            // Tambahan
            $table->integer('jumlah_tamu')->nullable();
            $table->decimal('total_biaya', 15, 2)->nullable();
            $table->text('catatan_laporan')->nullable();
            $table->unsignedTinyInteger('rating')->nullable(); // 1-5 misalnya
            $table->text('feedback')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
}
