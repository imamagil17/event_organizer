<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKliensTable extends Migration
{
    public function up(): void
    {
        Schema::create('kliens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jenis_klien', ['perorangan', 'perusahaan', 'organisasi'])->default('perorangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kliens');
    }
}
