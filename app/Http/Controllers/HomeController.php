<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {


        $user = Auth::user();
        if (!$user) {
            return redirect('/');
        }


        return view('home', compact('user'));
    }

    public function relationship(){
        $user = Auth::user();
        $city =  $user->city;      
        $users =  $city->users;      
        dd($users->toArray());
    }
}

