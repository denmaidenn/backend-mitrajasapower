<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi')->unique();
            $table->string('dari');
            $table->string('ke');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('jenis_barang');
            $table->string('tipe_pengiriman');
            $table->enum('status', ['Approved', 'Pending', 'Complete', 'Rejected', 'In Progress']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}; 