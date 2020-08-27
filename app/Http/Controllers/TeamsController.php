<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
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
    public function create(Request $request)
    {
        $admins = DB::table('users')->where("user_level", 7)->get();
        $members = [];
        return view("dashboard.teams.create", [
            "admins" => $admins,
            "members" => $members,
        ]);

    }

    public function searchUser(Request $request)
    {

        $email = $request->query('email');
        $users = User::where("email", $email)->get();

        return response($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = $request->except(['_token', 'members']);
        $stored = Team::create($team);

        $members = $request->input('members');
        $members = strlen($members) == 0 ? [] : explode(",", $members);
        foreach ($members as $key => $item) {
            DB::table('vieva_team_members')->insert(['corporate_group_id' => $stored->id, 'user_id' => $item]);
        }

        return redirect('/administration?tab=teams');
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
        $team = Team::where("group_id", $id)->first();
        $admins = DB::table('users')->where("user_level", 7)->get();
        $members = $team->members;
// $members = DB::table('vieva_team_members')->where("corporate_group_id", $id)->get();

        return view("dashboard.teams.edit", [
            "members" => $members,
            "team" => $team,
            "admins" => $admins,
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
        $team = $request->except(['_token', '_method', 'members', 'deleted_members']);
        $stored = Team::where("group_id", $id)->update($team);

        $members = $request->input('members');
        $members = strlen($members) == 0 ? [] : explode(",", $members);
        foreach ($members as $key => $item) {
            DB::table('vieva_team_members')->insert(['corporate_group_id' => $id, 'user_id' => $item]);
        }

        $deleted = $request->input('deleted_members');
        $deleted = strlen($deleted) == 0 ? [] : explode(",", $deleted);
        foreach ($deleted as $key => $item) {
            DB::table('vieva_team_members')->where(['corporate_group_id' => $id, 'user_id' => $item])->delete();
        }

        return redirect('/administration?tab=teams');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::where("group_id", $id)->delete();
        return redirect('/administration?tab=teams');

    }

    public function addMember(Request $request)
    {
        $user_id = $request->query('user_id');

        DB::table('vieva_team_members')->insert(["user_id" => $user_id, "corporate_group_id" => 232]);
    }
}
