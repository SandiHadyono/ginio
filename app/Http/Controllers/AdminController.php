<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('level',2)->paginate(2);
        // return view('admin.index',compact('admin'))->with('title', 'Kelola Admin - Ginio Digital');
        return view('admin.index',[
            'title'=>'Kelola Admin - Ginio Digital',
            'admin' => $admin,
            'breadcumb' => 'Admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'alamat' => $request['alamat'],
            'password' => bcrypt($request['password']),
            'level' => 2,
            'numb' => $request['numb'],
            'email' => $request['email'],
        ]);
        return redirect()->route('admin.index')->with('success','Admin Created');
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
        //
    }
    public function search(Request $request){
        $data = User::whereLike('fname',$request['search']);
        return view('admin.index', [
            'title'=>'Kelola Admin - Ginio Digital',
            'data' => $data,
            'breadcumb' => 'Admin'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'alamat' => $request['alamat'],
            'numb' => $request['numb'],
        ]);
        return redirect()->back()->with('success','Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->back()->with('warning', 'Admin Deleted','Toast');
    }
}
