<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Quote;
use App\Series;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $series = Series::orderBy('display_order')->get();
        $lessons = Lesson::all();
        $quotes = Quote::all();
        $english_quotes = Quote::where("language", 1)->count();
        $frensh_quotes = Quote::where("language", 0)->count();
        $tools = DB::table('vieva_tools')->get();

        return view("dashboard.content.index", [
            "series" => $series,
            "lessons" => $lessons,
            "quotes" => $quotes,
            "english_quotes" => $english_quotes,
            "frensh_quotes" => $frensh_quotes,
            "tools" => $tools,
        ]);
    }
}
