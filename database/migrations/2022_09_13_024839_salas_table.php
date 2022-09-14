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
        Schema::create('Salas', function (Blueprint $table) {
            $table->id();

            $table->string('Name');
            $table->string('Description')->nullable();
            $table->unsignedBigInteger('predio_id');
            $table->foreign('predio_id')->references('id')->on('Predios');
            $table->unsignedBigInteger('photogallery_id');
            $table->foreign('photogallery_id')->references('id')->on('PhotoGalleries');
            $table->unsignedBigInteger('typeSala_id');
            $table->foreign('typeSala_id')->references('id')->on('TypesSalas');

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
        Schema::dropIfExists('salas');
    }
};
