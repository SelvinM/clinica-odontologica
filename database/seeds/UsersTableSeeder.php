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
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Doctor',
            'email' => 'doctor@email.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'role_id' => 3,
            'assigned_doctor_id' => 2,
            'name' => 'Assistant',
            'email' => 'assistant@email.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
    }
}