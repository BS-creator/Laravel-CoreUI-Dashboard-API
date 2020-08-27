<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrationController extends Controller
{
    public function index(Request $request)
    {
        $admins = DB::table('users')->where("user_level", 1)->get();
        $super = DB::table('users')->where("user_level", 0)->get();
        $clients = DB::table('vieva_corporate_clients')->get();
        $teams = DB::table('vieva_corporate_groups')->get();

        $email = $request->query('email');
        $users = User::where("email", $email)->get();

        return view("dashboard.administration.index", [
            "admins" => $admins,
            "super" => $super,
            "clients" => $clients,
            "teams" => $teams,
            "email" => $email,
            "users" => $users,
        ]);
    }
}
