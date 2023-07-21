<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\Materi;
use Illuminate\Http\Request;

class DaftarHadirController extends Controller
{
    public function hadir(Materi $materi)
    {
        $idSiswa = auth()->user()->nomor;
        $cekData = DaftarHadir::where('siswa_id', $idSiswa)->get();
        if (!$cekData) {
            $data = [
                'siswa_id' => auth()->user()->nomor,
                'materi_id' => $materi->id
            ];
            DaftarHadir::create($data);
            return redirect('/bab');
        }
        return redirect('/bab');
    }
}
