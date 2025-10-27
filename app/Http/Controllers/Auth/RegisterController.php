<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:25|min:3',
            'last_name' => 'required|max:25|min:3',
            'email' => 'required|email|unique:users',
            'password'=> 'required|max:10| min:6',
            'mo_no'=> 'required|between:5,10' ,
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . rand(10000, 1000088) . $image->getClientOriginalName();
            $image->storeAs('image', $image_name, 'public');
            $image_name = 'image/' . $image_name;
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->hobby = ($request->hobby) ? implode(',', $request->hobby) : null;
        $user->mo_no = $request->mo_no;
        $user->city_id = $request->city_id;
        $user->image = isset($image_name) ? $image_name : null;
        $user->save();
        return redirect('/')->with('success', 'User Created Successfully');
    }
}
