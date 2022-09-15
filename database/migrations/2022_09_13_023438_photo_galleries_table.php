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
        Schema::create('PhotoGalleries', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->enum('Type', ['Predios', 'Salas']);
            $table->unsignedBigInteger('Model_id');
            $table->string('Model_Type');
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
        Schema::dropIfExists('PhotoGalleries');
    }
};
