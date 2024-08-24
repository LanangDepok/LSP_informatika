<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('alamat_ktp')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->string('kota_lahir')->nullable();
            $table->string('provinsi_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->enum('status_menikah', ['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)'])->nullable();
            $table->enum('agama', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Lain-lain'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
