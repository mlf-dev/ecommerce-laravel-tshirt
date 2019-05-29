<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new \App\Role();
        $role->nom = "admin";
        $role->description = "le big boss du site e-commerce";
        $role->save();

        $role2 = new \App\Role();
        $role2->nom = "acheteur";
        $role2->description = "le client";
        $role2->save();
    }
}
