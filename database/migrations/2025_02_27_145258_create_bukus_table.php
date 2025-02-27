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
            Schema::create('bukus', function (Blueprint $table) {
                $table->id();
                $table->string('id_buku')->unique();
                $table->string('kategori');
                $table->string('nama_buku');
                $table->decimal('harga', 10, 2);
                $table->integer('stok');
                $table->string('id_penerbit')->index();
                // $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbits')->onDelete('cascade');
                $table->timestamps();
            });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};