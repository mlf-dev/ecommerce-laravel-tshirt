<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->float('total_ttc');
            $table->float('total_ht');
            $table->float('tva');
            $table->float('taux-tva');

            // si un compte client est supprimé on ne veut pas supprimer les commandes associées (utilisation du soft delete pour les comptes clients), mais dans tous les cas il vaut mieux garder les commandes dans la base de données ne serait-ce que pour la comptabilité. On veut malgré tout empêcher qu'une commande soit créée sans adresse, la clé étrangère n'est donc pas nullable :
            $table->unsignedBigInteger('adresse_id');

            $table->foreign('adresse_id')->references('id')->on('adresses')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
