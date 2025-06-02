<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaraVendorTable extends Migration
{
    public function up()
    {
        Schema::create('acara_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id')->constrained()->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            // Jika kamu punya kolom tambahan di pivot seperti 'peran', tambahkan di sini:
            $table->string('peran')->nullable();
            $table->timestamps();

            $table->unique(['acara_id', 'vendor_id']); // supaya tidak duplikat
        });
    }

    public function down()
    {
        Schema::dropIfExists('acara_vendor');
    }
}