<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activitie;


class ActivitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activitie::create([
            'name' => 'Crosfit',
            'days' => 'L,M,X,J,V',
            'n_sessions' => '5',
            'schedule' => '2000-07-01',
            'duration' => '30',
            'max_participant' => '10',
        ]);
    }
}
