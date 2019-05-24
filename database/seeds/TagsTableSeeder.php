<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // on créé un nouveau tag
        $tag = new \App\Tag();
        $tag->nom = 'Humour';
        $tag->save();

        // créé dans la table de jointure la liaison entre les produits et les tags
        $tag->products()->attach([2,4]);
    }
}
