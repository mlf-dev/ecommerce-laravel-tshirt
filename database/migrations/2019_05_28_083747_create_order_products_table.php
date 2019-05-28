<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            // On a supprimé l'id en clé primaire, car il n'a aucun intérêt ici
            $table->timestamps();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // on ne veut pas garder des lignes de commandes de produits si la commande a été supprimée

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // si un produit est supprimé, la ligne sera supprimée également, mais on ne peut pas le laisse null, pour contrer cela on peut également mettre un soft delete sur les produits

            $table->string('size');
            $table->integer('qty');
            $table->float('prix_unitaire_ht');
            $table->float('prix_unitaire_ttc');
            $table->float('prix_total_ht');
            $table->float('prix_total_ttc');

            // Clé primaire sur 3 attributs :
            $table->primary(['order_id','product_id','size']);

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
        Schema::dropIfExists('order_products');
    }
}
