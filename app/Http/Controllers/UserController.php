<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = User::where('jabatan', 'siswa')->get();
        return view('siswa', [
            'siswa' => $siswa
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
        $validate = $request->validate([
                'name' => 'string|required',
                'alamat' => 'required'
        ]);
        $validate['nomor'] = mt_rand(0000,99999);
        User::create($validate);

        return redirect('/siswa');
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
        //
        return view('siswa.edit',[
            'siswa' => $user

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required',
            'alamat' => 'required'
        ]);
        User::where('nomor',$user->nomor)->update($validate);
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
                return redirect('/siswa');
    }
}
