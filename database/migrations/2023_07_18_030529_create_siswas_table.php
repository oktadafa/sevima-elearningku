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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->enum("jurusan",['Teknik Komputer dan Jaringan', 'Teknik Bisnis Sepeda Motor', 'Teknik Mesin', 'Akuntansi'])->nullable();
            $table->integer("nomor")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
