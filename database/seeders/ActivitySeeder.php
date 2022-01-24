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
            'days' => 'L,M,X,J,V',
            'n_sessions' => '5',
            'schedule' => '2000-07-01',
            'duration' => '30',
            'max_participant' => '10',
        ]);
    }
}
