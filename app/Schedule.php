<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    public $timestamps = false;

    public static function getScheduleData($id) {
        return Schedule::find($id)->content;
    }

    public static function getScheduleIdByUser() {
        return Schedule::find(SchoolClass::getSchoolClassById(Auth::user()->class_id)->schedule_id)->id;
    }
}
