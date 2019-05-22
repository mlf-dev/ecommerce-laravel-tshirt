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

    }
}
