<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =Guru::all();
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
            'nama' => 'required',
            'alamat' => 'required'
        ]);
        $validation['nomor'] = mt_rand(00000,99999);
        Guru::create($validation);

        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $user)
    {
        return view('guru.edit',[
            'guru' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $user)
    {
        //
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ]);
        Guru::where('nomor', $user->nomor)->update($validate);
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $user)
    {
    Guru::destroy($user->id);
    return redirect('/guru');
    }
}
