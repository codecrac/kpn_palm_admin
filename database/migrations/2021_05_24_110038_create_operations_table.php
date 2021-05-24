<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('titre');
            $table->string('description');
            $table->string('cash')->nullable();
            $table->string('statut');
            $table->string('temps_depart')->nullable();
            $table->string('temps_arriver')->nullable();
            $table->enum('maluces',['oui','non'])->default('non');
            $table->string('commentaire');
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
        Schema::dropIfExists('operations');
    }
}
