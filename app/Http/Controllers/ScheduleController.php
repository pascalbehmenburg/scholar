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
        $data = Schedule::getScheduleData($scheduleId);

        if (isset($data)) {
            return view('schedule')->with(['schedule_content' => $data, 'id' => $scheduleId]);
        }
        return redirect()->back()->withErrors(['schedule' => 'There is no schedule corresponding to the schedule id.']);
    }

    public function update(Request $request) {
        $request::validate([
            'id' => ['required', 'Integer'],
            'content' => ['required', 'JSON']
        ]);

        $id = $request->get('id');
        $content = $request->get('content');

        /** @var Schedule $schedule */
        $schedule = Schedule::find($id);
        
        $schedule->content = $content;
        $schedule->save();
        return redirect('/schedule/' . $id);
    }
}
