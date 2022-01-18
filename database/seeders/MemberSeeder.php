<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'dni' => '23261740Y',
            'name' => 'Paquito Salas',
            'weight' => '80.5',
            'height' => '1.82',
            'birth_date' => '2000-07-01',
            'gender' => 'Hombre',
        ]);
    }
}
