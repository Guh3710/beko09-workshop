<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            // Relasi ke users
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Jenis transaksi (sparepart / jasa)
            $table->enum('jenis_transaksi', ['sparepart', 'jasa']);

            // Relasi ke spareparts
            $table->foreignId('sparepart_id')
                ->nullable()
                ->constrained('spareparts')
                ->onDelete('set null');

            // Relasi ke jasa_bubuts
            $table->foreignId('jasa_bubut_id')
                ->nullable()
                ->constrained('jasa_bubuts')
                ->onDelete('set null');

            $table->integer('qty');
            $table->decimal('total_harga', 10, 2);

            // Status transaksi
            $table->enum('status', ['pending', 'dibayar', 'selesai'])->default('pending');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
