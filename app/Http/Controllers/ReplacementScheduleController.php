<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ReplacementSchedule;
use Illuminate\Http\Request;

class ReplacementScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the replacement schedule.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/replacement-schedule')->with('replacement_schedule_content', ReplacementSchedule::getScheduleData());
    }

    /**
     *  Update the replacement schedule.
     *  @param $request Request containing the content of the new ReplacementSchedule.
     */
    public function update(Request $request) {
        $request::validate([
            'content' => ['required', 'JSON']
        ]);

        $schedule = ReplacementSchedule::getSchedule();
        $schedule->content = $request->get('content');
        $schedule->save();
        return redirect()->back();
    }
}
