<?php

namespace App\Http\Controllers;

use App\Coaching;
use App\User;
use Illuminate\Http\Request;

class CoachingReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->query('email');
        $users = User::where("email", $email)->get();
        $coachings = Coaching::all();

        return view("dashboard.coaching_reports.index", [
            "coachings" => $coachings,
            "users" => $users,
            "email" => $email,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.coaching_reports.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coaching = $request->except(['_token']);
        Coaching::create($coaching);

        return redirect('/coaching_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coaching = Coaching::where('coaching_id', $id)->first();
        if ($coaching['target'] == "9") {
            $coaching['target'] = " All Users";
        } else if ($coaching['target'] == 2) {
            $coaching['target'] = " Corporate Users";
        } else {
            $coaching['target'] = " Premium Users";
        }

        return view("dashboard.coaching_reports.show", [
            "coaching" => $coaching,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coaching = Coaching::where("report_id", $id)->first();

        return view("dashboard.coaching_reports.edit", [
            "coaching" => $coaching,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Coaching::where("report_id", $id)->update($request->except(['_token', '_method', 'video_id']));
        return redirect('/coaching_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coaching::where("report_id", $id)->delete();
        return redirect('/coaching_reports');
    }
}
