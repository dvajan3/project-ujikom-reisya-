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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul', 200);
            $table->longText('isi');
            $table->date('tanggal')->default(DB::raw('CURRENT_DATE'));
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
