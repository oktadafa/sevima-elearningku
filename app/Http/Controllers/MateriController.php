<?php

namespace App\Http\Controllers;

use App\Models\BabPelajaran;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = request('judul');
        return view('pelajaran.materi.indexMateri',[
        'data' => [Materi::all(), $data]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BabPelajaran $judul)
    {
    return view('pelajaran.materi.createMateri',[
    'data' => $judul]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $judul = BabPelajaran::where('judul', $request->bab_judul)->get();
        $validate['bab_id'] = $judul[0]->id;
        $validate['guru_id'] = auth()->user()->id;
        Materi::create($validate);
        $url = $judul[0]->judul;
        return redirect("/bab/$url");

    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
        return view('pelajaran.materi.showMateri',[
        'data' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        //
    }
}
