<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \App\Product();
        $product->nom ="T-shirt Goonies";
        $product->prix_ht = 22;
        $product->description = "T-shirt du film Les Goonies";
        $product->id_category = 1;
        $product->photo_principale = "goonies.jpg";
        $product->save();

        $product2 = new \App\Product();
        $product2->nom ="T-shirt M.Happy";
        $product2->prix_ht = 24;
        $product2->description = "T-shirt qui rend heureux";
        $product2->id_category = 2;
        $product2->photo_principale = "happy.jpg";
        $product2->save();

        $product3 = new \App\Product();
        $product3->nom ="T-shirt Hulk";
        $product3->prix_ht = 28;
        $product3->description = "T-shirt qui rend plus fort";
        $product3->id_category = 1;
        $product3->photo_principale = "hulk.jpg";
        $product3->save();

        $product4 = new \App\Product();
        $product4->nom ="T-shirt Krusty le clown";
        $product4->prix_ht = 25;
        $product4->description = "T-shirt qui rend plus drôle";
        $product4->id_category = 2;
        $product4->photo_principale = "krusty_simpsons.jpg";
        $product4->save();

        $product5 = new \App\Product();
        $product5->nom ="T-shirt Little Miss Sunshine";
        $product5->prix_ht = 24;
        $product5->description = "T-shirt qui fait sourire";
        $product5->id_category = 2;
        $product5->photo_principale = "little_miss_sunshine.jpg";
        $product5->save();

        $product6 = new \App\Product();
        $product6->nom ="T-shirt Les Simpsons";
        $product6->prix_ht = 28;
        $product6->description = "T-shirt qui rend jaune";
        $product6->id_category = 4;
        $product6->photo_principale = "simpsons.jpg";
        $product6->save();

        $product7 = new \App\Product();
        $product7->nom ="T-shirt Start Trek";
        $product7->prix_ht = 20;
        $product7->description = "T-shirt qui rend chelou";
        $product7->id_category = 4;
        $product7->photo_principale = "star_trek_kirk.jpg";
        $product7->save();

        $product8 = new \App\Product();
        $product8->nom ="T-shirt Superman";
        $product8->prix_ht = 35;
        $product8->description = "T-shirt qui rend invincible";
        $product8->id_category = 1;
        $product8->photo_principale = "super_man.jpg";
        $product8->save();

        $product9 = new \App\Product();
        $product9->nom ="T-shirt Wonder Woman";
        $product9->prix_ht = 30;
        $product9->description = "T-shirt qui rend femme";
        $product9->id_category = 1;
        $product9->photo_principale = "wonder_woman.jpg";
        $product9->save();
    }
}
