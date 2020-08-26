<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotesController extends Controller
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
        $lessons = Lesson::all();
        return view("dashboard.quotes.create", [
            "lessons" => $lessons,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = $request->except(['_token', 'video_id']);
        $stored = Quote::create($quote);

        DB::table('vieva_quote_video_related')->insert(['quote_id' => $stored->id, 'video_id' => $request->input('video_id')]);

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
        $lessons = Lesson::all();
        $quote = Quote::where("quote_id", $id)->get();

        $related_lesson = DB::table('vieva_quote_video_related')->where('quote_id', $quote[0]->quote_id)->get();

        return view("dashboard.quotes.edit", [
            "quote" => $quote[0],
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
        Quote::where("quote_id", $id)->update($request->except(['_token', '_method', 'video_id']));
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
        Quote::where("quote_id", $id)->delete();
        return redirect('/content');
    }
}
