<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' => 'Crosfit',
            'description' => 'Es hacer muchas cosas',
            'duration' => '30',
            'max_participant' => '10',
        ]);

        Activity::create([
            'name' => 'Spinning',
            'description' => 'Montar en bicicleta',
            'duration' => '120',
            'max_participant' => '30',
        ]);

        Activity::create([
            'name' => 'Step',
            'description' => 'Subir escaleras pero no',
            'duration' => '60',
            'max_participant' => '20',
        ]);
    }
}
