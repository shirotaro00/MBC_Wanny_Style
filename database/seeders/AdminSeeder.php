<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nom'=> 'Admin ',
            'prenom'=>'wannystyle',
            'telephone'=>"0340000148",
             'email'=>"wannystyle@gmail.com",
             'password'=>Hash::make('1234567'),
             'adresse'=>'nanisana',
             'role'=>'0',
             'created_at'=>now(),
             'updated_at'=>now(),


        ]);

    }
}
