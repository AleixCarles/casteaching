<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersManageController extends Controller
{
    public static function testedBy()
    {
        return UsersManageController::class;
    }

    public function index()
    {
        return view('users.manage.index',
            ['users' => User::all()
            ]);
    }

    /**
     * C -> Create -> Mostrar el formulari de creacio
     */
    public function create()
    {
        //
    }

    /**
     * C -> Create -> Guardara a base de dades el nou video
     */
    public function store(Request $request)
    {
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)
        ]);

        session()->flash('status','Successfully created');
        return redirect()->route('manage.users');
    }

    /**
     * R -> NO LLISTA -> Individual ->
     */
    public function show($id)
    {
        //
    }

    /**
     * U -> update -> Form
     */
    public function edit($id)
    {
        //
    }

    /**
     * U -> update -> Processarà el form i guardara les modificacions
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * D -> Delete
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('status','Successfully removed');

        return redirect()->route('manage.users');
    }
}
