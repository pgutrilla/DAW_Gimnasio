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
            'name' => 'Paquito Salas',
            'weight' => '80.5',
            'height' => '1.82',
            'birth_date' => '2000-07-01',
            'gender' => 'Hombre',
            'email' => 'admin@gym.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('password'),
            // 'role_id' => 2 ,            
        ]);
        User::create([
            'dni' => '23261740Z',
            'name' => 'Paquita Salas',
            'weight' => '80.5',
            'height' => '1.82',
            'birth_date' => '2000-07-01',
            'gender' => 'Mujer',
            'email' => 'admin2@gym.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('password'),
            // 'role_id' => 3 ,
            
        ]);
    }
}
