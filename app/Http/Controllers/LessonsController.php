<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view("dashboard.lessons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = $request->except(['_token', 'video_file']);

        $path = $request->file('video_file')->store('public/lessons');
        $lesson['video_file'] = $path;

        Lesson::create($lesson);

        return redirect('/content');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::where("lesson_id", $id)->get();
        return view("dashboard.lessons.edit", ["lesson" => $lesson[0]]);
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
        $lesson = $request->except(['_token', '_method', 'video_file']);

        if ($request->file('video_file')) {
            $path = $request->file('video_file')->store('public/lessons');
            $lesson['video_file'] = $path;
        }

        Lesson::where("lesson_id", $id)->update($lesson);

        return redirect('/content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where("lesson_id", $id)->delete();
        return redirect('/content');
    }
}
