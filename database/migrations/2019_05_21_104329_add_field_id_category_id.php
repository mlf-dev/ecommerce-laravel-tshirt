<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldIdCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_category'); // il faut ajouter nullable() si on écrit set null dans foreign cf add_field_id_parent dans database>migration
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade'); // ou on delete set null si on ne veut pas supprimé le produit en cas de suppression de catégorie

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
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
