<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('pseudo')->unique();
            $table->string('email')->nullable();
            $table->string('telephone');
            $table->string('mot_de_passe');
            $table->string('adresse');
            $table->integer('op_non_lu')->default('0');
            $table->integer('info_non_lu')->default('0');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producteurs');
    }
}
