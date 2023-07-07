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
        Schema::create('list_bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_buku');
            $table->string('slug');
            $table->text('deskripsi');
            $table->integer('kategori_id');
            $table->integer('penulis_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_bukus');
    }
};
