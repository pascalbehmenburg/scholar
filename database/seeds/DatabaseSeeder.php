<?php

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
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ReplacementScheduleSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(SchoolClassSeeder::class);
        $this->call(UserSeeder::class);
    }
}
