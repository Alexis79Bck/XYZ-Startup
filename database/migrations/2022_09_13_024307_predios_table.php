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
        Schema::create('Predios', function (Blueprint $table) {
            $table->id();

            $table->string('Name');
            $table->string('Description');
            $table->string('URLGoogleMap')->nullable();
            $table->string('CEP', 9);
            $table->string('State');
            $table->string('UF');
            $table->string('City');
            $table->string('StreetAddress')->nullable();
            $table->string('Number');
            $table->string('Complement')->nullable();
            $table->string('customer_cnpj');
            $table->foreign('customer_cnpj')->references('CNPJ')->on('Customers');
            $table->unsignedBigInteger('photogallery_id');
            $table->foreign('photogallery_id')->references('id')->on('PhotoGalleries');

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
        Schema::dropIfExists('predios');
    }
};
