<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;

    /**
     *  Relation: Schedule belongs to SchoolClass.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'schedule_id');
    }

    /**
     *  Allows the access to data of schedules by passing the id.
     *  Implemented to allow admins accessing other tables than the own one.
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

    /**
     *  Returns the id of the schedule from the currently authenticated user.
     *  Used to build the url /schedule/{id} for the current user.
     */
    public static function getScheduleIdByUser()
    {
        /** @var User $user */
        $user = Auth::user();

        return ($user->schoolClass->schedule)->id;
    }
}
