<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_letters', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('letter_id');
            $table->text('generated_content');
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generated_letters');
    }
}
