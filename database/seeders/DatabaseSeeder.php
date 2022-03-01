<?php

namespace Database\Seeders;;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(RoleSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
