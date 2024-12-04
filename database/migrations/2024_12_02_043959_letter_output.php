<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_outputs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id'); // Foreign key ke tabel templates
            $table->string('letter_number')->nullable(); // Nomor surat
            $table->date('date')->nullable(); // Tanggal surat
            $table->string('recipient')->nullable(); // Penerima surat
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Definisi foreign key
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_outputs'); // Hapus tabel yang sesuai
    }
};
