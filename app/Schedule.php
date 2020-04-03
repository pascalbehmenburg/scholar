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
        return $this->belongsTo(SchoolClass::class, 'schedule_id');
    }

    /**
     * Implemented to allow the access to other schedules than the own one (administrative purposes)
     */
    public static function getScheduleData($id) {
        /** @var Schedule $schedule */
        $schedule = Schedule::find($id);
        
        if (isset($schedule)) {
            $schedule->content;
        }

        //return empty default
        //TO-DO: display error message on /schedule/1 if we reach this return
        return 1;
    }

    public static function getScheduleIdByUser()
    {
        /** @var User $user */
        $user = Auth::user();

        return ($user->schoolClass->schedule)->id;
    }
}
