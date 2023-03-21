<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $id_user = Auth::id();
        Schema::create('pengaduan', function (Blueprint $table) use ($id_user) {
            $table->id();
            $table->unsignedBigInteger('id_user')->default($id_user); // menggunakan ID user dari session
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('judul');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['Belum Di Proses', 'Sedang Di Proses', 'Selesai'])->default('Belum Di Proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
