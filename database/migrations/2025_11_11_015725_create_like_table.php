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
       Schema::create('like', function (Blueprint $table) {
            $table->id('id_like');
            $table->unsignedBigInteger('id_artikel')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_artikel')->references('id_artikel')->on('artikel')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id_user')->on('user')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like');
    }
};
