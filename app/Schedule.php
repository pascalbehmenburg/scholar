<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }



    public static function getScheduleData($id) {
        return Schedule::find($id)->content;
    }

    public static function getScheduleIdByUser()
    {
        /** @var User $user */
        $user = Auth::user();


        return Schedule::find(SchoolClass::getSchoolClassById()->schedule_id)->id;
    }
}
