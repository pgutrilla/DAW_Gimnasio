<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::create([
            'id' => 1,
            'name' => 'registrado',
        ]);

        Role::create([
            'id' => 2,
            'name' => 'usuario',
        ]);

        Role::create([
            'id' => 3,
            'name' => 'admin',
        ]);
    }
}
