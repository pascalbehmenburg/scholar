<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ReplacementSchedule extends Model
{
    public $timestamps = false;

    public static function getScheduleData() {
        return self::find(DB::table('replacement_schedules')->max('id'))->content;
    }

    public static function getSchedule() {
        return self::find(DB::table('replacement_schedules')->max('id'));
    }
}
