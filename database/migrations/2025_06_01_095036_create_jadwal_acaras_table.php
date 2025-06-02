<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAcarasTable extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id')->constrained('acaras')->onDelete('cascade');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('judul_kegiatan');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_acaras');
    }
}
