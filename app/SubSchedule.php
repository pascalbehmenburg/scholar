<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubSchedule extends Model
{
    protected $table = 'substitution_schedule';
    public $timestamps = false;

    public static function getSubScheduleData() {
        return self::find(DB::table('substitution_schedule')->max('id'))->content;
    }

    public static function getCurrentSchedule() {
        return self::find(DB::table('substitution_schedule')->max('id'));
    }
}
