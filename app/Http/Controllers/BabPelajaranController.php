<?php

namespace App\Http\Controllers;

use App\Models\BabPelajaran;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;

class BabPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bab = BabPelajaran::all();
        $mapel = Mapel::all();
        return view('pelajaran.materi.index',[
        'data' => [$mapel,$bab]
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = BabPelajaran::where('user_id', auth()->user()->id)->get();
        $materi = Mapel::all();
        return view('pelajaran.materi.showBab', [
        'data' => [$data, $materi],
        'jenis' => 'BAB'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validato = $request->validate([
            'judul' => 'required|unique:bab_pelajarans,judul',
            'mapel_id' => 'required'
        ]);
        $validato['user_id'] = auth()->user()->id;
        BabPelajaran::create($validato);
        return redirect('/bab/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(BabPelajaran $bab)
    {
        return view('pelajaran.materi.indexMateri',[
            'data' => [Materi::where('bab_id', $bab->id)->get(), $bab],
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BabPelajaran $babPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BabPelajaran $babPelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BabPelajaran $babPelajaran)
    {
        //
    }
}
