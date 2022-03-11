<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'dni' => '23261740Y',
            'name' => 'Paquito Admin',
            'weight' => '80.5',
            'height' => '1.82',
            'birth_date' => '2000-07-01',
            'gender' => 'Hombre',
            'email' => 'admin@gym.com',
            'rol' => 'admin',
            'email_verified_at' => NULL,
            'password' => Hash::make('password'),
            // 'role_id' => 2 ,            
        ]);
        User::create([
            'dni' => '23261740Z',
            'name' => 'Paquita User',
            'weight' => '80.5',
            'height' => '1.82',
            'birth_date' => '2000-07-01',
            'gender' => 'Mujer',
            'email' => 'user@gym.com',
            'rol' => 'user',
            'email_verified_at' => NULL,
            'password' => Hash::make('password'),
            // 'role_id' => 3 ,
            
        ]);
    }
}
