<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
     User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('laxyo123')
        ]);
    }
}