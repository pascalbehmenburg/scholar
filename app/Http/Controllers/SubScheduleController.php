<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\SubSchedule;
use Illuminate\Http\Request;

class SubScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/substitution-schedule')->with('sub_schedule_content', SubSchedule::getSubScheduleData());
    }

    public function update(Request $request) {
        $schedule = SubSchedule::getCurrentSchedule();
        $schedule->content = $request->get('content');
        $schedule->save();
        return redirect()->back();
    }
}
