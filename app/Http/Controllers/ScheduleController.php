<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public $restful = true;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param $scheduleID
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($scheduleId)
    {
        return view('schedule')->with(['schedule_content' => Schedule::getScheduleData($scheduleId), 'id' => $scheduleId]);
    }

    public function update(Request $request) {
        $schedule = Schedule::find($request->get('id'));
        $schedule->content = $request->get('content');
        $schedule->save();
        return redirect('/schedule/' . $request->get('id'));
    }
}
