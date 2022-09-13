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
        Schema::create('Addresses', function (Blueprint $table) {
            $table->id();
            $table->string('CEP', 9);
            $table->string('State');
            $table->string('UF');
            $table->string('City');
            $table->string('StreetAddress');
            $table->string('Number');
            $table->string('Complement');
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
        Schema::dropIfExists('Addresses');
    }
};
