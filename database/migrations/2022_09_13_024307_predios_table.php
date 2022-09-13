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
            $table->string('URLGoogleMap');
            $table->foreignId('address_id')->constrained();
            $table->foreignId('photogallery_id')->nullable()->constrained();
            $table->foreignId('customer_id')->constrained();

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
