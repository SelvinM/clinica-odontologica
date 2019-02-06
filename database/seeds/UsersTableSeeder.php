<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@correo.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
    }
}