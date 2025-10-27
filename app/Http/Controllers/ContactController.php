<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidate;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $contacts = Contact::where('user_id', Auth::id())->paginate(10);
        $search = $request->input('search' , null);
        if($request->search){
            $contacts = Contact::where('first_name' , 'like' ,'%'.$search.'%')
            ->orWhere('last_name' , 'like' ,'%'.$search.'%')
            ->orWhere('email' , 'like' ,'%'.$search.'%')
            ->orWhere('mo_no' , 'like' ,'%'.$search.'%')
            ->orWhere('gender' , 'like' ,'%'.$search.'%')
            ->orWhere('user_id', Auth::id())
            ->paginate(10);
        }

        return view('contact.list', compact('contacts' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactValidate $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $contact = new Contact();
        $contact->user_id = Auth::id();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->gender = $request->gender;
        $contact->mo_no = $request->mo_no;
        $contact->city_id = $request->city_id;
        $contact->save();
        return redirect('contact/list')->with('success', 'Contact Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $contact = Contact::find($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);

        return view('contact.edit' , compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactValidate $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }
        $contact =Contact::find($request->id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->mo_no = $request->mo_no;
        $contact->save();
        return redirect('contact/list')->with('success', 'Contact Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contact/list')->with('success', 'Contact Deleted Successfully');
    }
}
