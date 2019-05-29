<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new \App\Category();
        $category->nom = "Films";
        $category->is_online = 1;
        $category->save();

        $category2 = new \App\Category();
        $category2->nom = "Séries TV";
        $category2->is_online = 1;
        $category2->save();

        $category3 = new \App\Category();
        $category3->nom = "Musique";
        $category3->is_online = 1;
        $category3->save();

        $category4 = new \App\Category();
        $category4->nom = "Jeux-Vidéos";
        $category4->is_online = 1;
        $category4->save();

        $category5 = new \App\Category();
        $category5->nom = "Sport";
        $category5->is_online = 1;
        $category5->save();

        $sous_categorie = new \App\Category();
        $sous_categorie->nom = "Les Goonies";
        $sous_categorie->is_online = 1;
        $sous_categorie->id_parent = 1;
        $sous_categorie->save();

        $sous_categorie2 = new \App\Category();
        $sous_categorie2->nom = "Wonder Woman";
        $sous_categorie2->is_online = 1;
        $sous_categorie2->id_parent = 1;
        $sous_categorie2->save();

        $sous_categorie3 = new \App\Category();
        $sous_categorie3->nom = "Monsieur Madame";
        $sous_categorie3->is_online = 1;
        $sous_categorie3->id_parent = 2;
        $sous_categorie3->save();

        $sous_categorie4 = new \App\Category();
        $sous_categorie4->nom = "Les simpsons";
        $sous_categorie4->is_online = 1;
        $sous_categorie4->id_parent = 2;
        $sous_categorie4->save();
    }
}
