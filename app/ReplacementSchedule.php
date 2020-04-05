<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ReplacementSchedule extends Model
{
    public $timestamps = false;

    /**
     *  Returns the schedule JSON data to display it in a table or use it for API interaction.
     */
    public static function getScheduleData() {
        return self::find(DB::table('replacement_schedules')->max('id'))->content;
    }

    /**
     *  Returns the schedule as a PDO object.
     */
    public static function getSchedule() {
        return self::find(DB::table('replacement_schedules')->max('id'));
    }
}
