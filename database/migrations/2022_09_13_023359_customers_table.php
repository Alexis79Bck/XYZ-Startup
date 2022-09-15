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
        Schema::create('Customers', function (Blueprint $table) {
            $table->id();
            $table->string('CNPJ', 20);
            $table->string('CompanyName');
            $table->string('FancyName');

            $table->string('Phone', 16)->nullable();
            $table->string('email')->nullable();
            $table->date('Birthday')->nullable();
            $table->string('CEP', 9);
            $table->string('State');
            $table->string('UF');
            $table->string('City');
            $table->string('StreetAddress')->nullable();
            $table->string('Number');
            $table->string('Complement')->nullable();

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
        Schema::dropIfExists('clientes');
    }
};
