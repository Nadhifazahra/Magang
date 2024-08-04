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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('status');
            $table->string('instansi');
            $table->string('jurusan');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('surat_pengantar');
            $table->longText('kartu');
            $table->longText('proposal')->nullable();
            $table->enum('keterangan', ['Waiting', 'Approved', 'Rejected', 'Active', 'Finished'])->default('Waiting');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
