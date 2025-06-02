<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaraVendorTable extends Migration
{
    public function up(): void
    {
        Schema::create('acara_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id')->constrained('acaras')->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acara_vendor');
    }
}
