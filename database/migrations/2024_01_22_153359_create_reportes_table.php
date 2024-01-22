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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('branchName')->nullable();
            $table->string('cityState')->nullable();
            $table->string('contact')->nullable();
            $table->string('numberRelatorie')->nullable();
            $table->string('tag')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('direction')->nullable();
            $table->string('functionProceso')->nullable();
            $table->string('faixa')->nullable();
            $table->string('medida')->nullable();
            $table->integer('fre')->nullable();
            $table->date('dataCalibration')->nullable();
            $table->date('dataNextCalibration')->nullable();
            $table->decimal('aplicada25', 8, 2)->nullable();
            $table->decimal('aplicada50', 8, 2)->nullable();
            $table->decimal('aplicada75', 8, 2)->nullable();
            $table->decimal('aplicada100', 8, 2)->nullable();
            $table->string('instrumentPadrao')->nullable();
            $table->string('certificado')->nullable();
            $table->string('model')->nullable();
            $table->string('dateAferica')->nullable();
            $table->string('serviceExecute')->nullable();
            $table->string('art')->nullable();
            $table->string('ingenier')->nullable();
            $table->string('tecnico')->nullable();
            $table->date('data')->nullable();
            $table->string('image_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
