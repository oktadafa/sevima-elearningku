<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('jabatan', 'guru')->get();
        return view('/guru', [
                'guru' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'name' => 'required',
            'alamat' => 'required'
        ]);
        $validation['jabatan'] = 'guru';
        $validation['nomor'] = mt_rand(00000,99999);
        User::create($validation);

        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('guru.edit',[
            'guru' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'alamat' => 'required'
        ]);
        User::where('nomor', $user->nomor)->update($validate);
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
    User::destroy($user->id);
    return redirect('/guru');
    }
}
