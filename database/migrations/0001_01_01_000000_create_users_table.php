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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('nama');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('role');
            $table->text('alamat_ktp')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('negara')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->string('kota_lahir')->nullable();
            $table->string('provinsi_lahir')->nullable();
            $table->string('negara_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->enum('status_menikah', ['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)'])->nullable();
            $table->enum('agama', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Lain-lain'])->nullable();
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
