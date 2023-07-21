<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa', [
        'siswa' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
                ]);
        $validation['nomor'] = mt_rand(0000,9999);
        Siswa::create($validation);

        return redirect('/siswa');

    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $user)
    {

    return view('siswa.edit', [
        'siswa' => $user
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $user)
    {
        $validate = $request->validate([
            'name' => 'required',
            'alamat' => 'required'
        ]);
        Siswa::where('nomor', $user->nomor)->update($validate);
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $user)
    {
        Siswa::destroy($user->id);
        return redirect('/siswa');
    }
}
