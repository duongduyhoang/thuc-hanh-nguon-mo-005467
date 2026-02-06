<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::All();
        return view('Users.User_management', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return redirect('/GetAddUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dataUser = User::findOrFail($id);
        return view('Users.Update_user', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $dataUser = User::findOrFail($id);
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;

        $dataUser->save();

        return redirect()->route('ListUser');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::destroy($id);
        return Redirect('/getallUser');
    }
}
