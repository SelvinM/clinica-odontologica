<?php

use Illuminate\Database\Seeder;

class BloodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->insert([
            'id' =>1,
            'name' => 'A+',
        ]);
        DB::table('blood_types')->insert([
            'id' =>2,
            'name' => 'B+',
        ]);
        DB::table('blood_types')->insert([
            'id' =>3,
            'name' => 'O+',
        ]);
        DB::table('blood_types')->insert([
            'id' =>4,
            'name' => 'AB+',
        ]);
        DB::table('blood_types')->insert([
            'id' =>5,
            'name' => 'A-',
        ]);
        DB::table('blood_types')->insert([
            'id' =>6,
            'name' => 'B-',
        ]);
        DB::table('blood_types')->insert([
            'id' =>7,
            'name' => 'O-',
        ]);
        DB::table('blood_types')->insert([
            'id' =>8,
            'name' => 'AB-',
        ]);
        
    }
}