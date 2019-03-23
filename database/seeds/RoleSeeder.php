<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new \App\Role();
        $roleAdmin->name = "ADMIN";
        $roleAdmin->save();

        $roleEnterpreneur = new \App\Role();
        $roleEnterpreneur->name = "ENTERPRENEUR";
        $roleEnterpreneur->save();

        $roleInvestor = new \App\Role();
        $roleInvestor->name = "ADMIN";
        $roleInvestor->save();
    }
}
