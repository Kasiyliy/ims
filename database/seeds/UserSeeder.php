<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->email = 'admin@mail.ru';
        $user->password = bcrypt('password');
        $user->name = 'Kasya';
        $user->phone_number = '870770707007';
        $user->role_id = \App\Role::ADMIN_ID;
        $user->save();
    }
}
