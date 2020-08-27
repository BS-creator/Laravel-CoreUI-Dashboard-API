<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Notific;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notific::all();
        return view("dashboard.notifications.index", [
            "notifications" => $notifications,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.notifications.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = $request->except(['_token']);
        $notification['date'] = date("Y-m-d-H-m-s");
        Notific::create($notification);

        return redirect('/notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notific::where('notification_id', $id)->first();
        if ($notification['target'] == "9") {
            $notification['target'] = " All Users";
        } else if ($notification['target'] == 2) {
            $notification['target'] = " Corporate Users";
        } else {
            $notification['target'] = " Premium Users";
        }

        return view("dashboard.notifications.show", [
            "notification" => $notification,
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
        $lessons = Lesson::all();
        $notification = Notific::where("quote_id", $id)->get();

        $related_lesson = DB::table('vieva_quote_video_related')->where('quote_id', $notification[0]->quote_id)->get();

        return view("dashboard.notifications.edit", [
            "quote" => $notification[0],
            "lessons" => $lessons,
            "related_lesson_id" => $related_lesson[0]->video_id,
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
        Notific::where("quote_id", $id)->update($request->except(['_token', '_method', 'video_id']));
        return redirect('/notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notific::where("quote_id", $id)->delete();
        return redirect('/notifications');
    }
}
