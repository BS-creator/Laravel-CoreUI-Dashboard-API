<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_order($origin_id, $target_id, $origin_val, $target_val)
    {
        Series::where(["serie_id" => $origin_id])->update(["display_order" => $target_val]);
        Series::where(["serie_id" => $target_id])->update(["display_order" => $origin_val]);

        return redirect('/content');
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view("dashboard.series.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->except(['_token']);
        $max_order_val = Series::max('display_order');

        $path = $request->file('picture')->store('public/series');

        $client['picture'] = $path;
        $client['display_order'] = $max_order_val + 1;

        Series::create($client);
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
        $series = Series::where("serie_id", $id)->get();

        return view("dashboard.series.edit", ["series" => $series[0]]);
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
        $series = $request->except(['_token', '_method', 'picture']);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('public/series');
            $series['picture'] = $path;
        }

        Series::where("serie_id", $id)->update($series);
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
        Series::where("serie_id", $id)->delete();
        return redirect('/content');
    }
}
