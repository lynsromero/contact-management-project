<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect('/');
        }


        $user = DB::table('users')
            ->leftJoin('cities', 'cities.id', 'users.city_id')
            ->where('users.id', Auth::id())
            ->select('users.*', 'cities.name as city_name')
            ->first();
        return view('home', compact('user'));
    }
}
