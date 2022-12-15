<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $result = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);

        if ($result) {
            return back()->with('success', 'Magic has been spelled');
        } else {
            return back()->with('failed', 'Magic has failed to spell');
        }
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
        $user = DB::table('users')->find($id);
        return view('users.edit', ['user' => $user]);
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
        $request->validate([
            'name' => ['required'],
            'email' => ['required']
        ]);

        $result = DB::table('users')->whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($result) {
            return redirect()->route('edit_user', $id)->with('success', 'Magic has been spelled');
        } else {
            return redirect()->route('edit_user', $id)->with('failed', 'Magic has failed to spell');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $result = DB::table('users')->whereId($id)->delete();

        if ($result) {
            return redirect()->route('show_users')->with('success', 'Magic has been spelled');
        } else {
            return redirect()->route('show_users')->with('failed', 'Magic has failed to spell');
        }
    }
}
