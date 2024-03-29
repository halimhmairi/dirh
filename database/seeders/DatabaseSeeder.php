<?php

namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            LeaveTypeSeeder::class,
            DepartmentSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            JobSeeder::class,
            CandidateSeeder::class,
            LeaveSeeder::class,
            LeaveCounterSeeder::class,
        ]); 
    }
}
