<?php

use Illuminate\Database\Seeder;

class ReplacementScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replacementSchedule = new App\ReplacementSchedule;
        $replacementSchedule->date = '0-0-0';
        $replacementSchedule->content = '{}';
        $replacementSchedule->save();
    }
}
