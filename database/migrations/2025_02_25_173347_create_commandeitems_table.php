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
        Schema::create('commandeitems', function (Blueprint $table) {
            $table->id();
            $table->string('quantité');
            $table->string('prixUnitaire');
            $table->unsignedSmallInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->unsignedSmallInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits');
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
        Schema::dropIfExists('commandeitems');
    }
};
