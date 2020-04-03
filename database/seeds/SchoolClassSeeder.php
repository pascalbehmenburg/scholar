<?php

use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolClass = new App\SchoolClass;
        $schoolClass->name = 'DI71';
        $schoolClass->room_id = 1;
        $schoolClass->schedule_id = 1;
        $schoolClass->save();
    }
}
