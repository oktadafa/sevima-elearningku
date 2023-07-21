<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BabPelajaranResource;
use App\Models\BabPelajaran;
use App\Models\Mapel;
use Illuminate\Http\Request;

class BabPelajaranController extends Controller
{

    public function index(){
        $data = BabPelajaran::all();
        return new BabPelajaranResource(200, 'Data Bab Pelajaran', $data);
    }

    public function show(Mapel $bab)
    {
        $mapel = BabPelajaran::where('mapel_id', $bab->id)->get();
        if (count($mapel))
         {
            return new BabPelajaranResource(true, 'Data Bab Pelajaran', $mapel);
         }
        return response()->json([
            'statuts' => false,
            'message' => 'Tidak Ada Materi',
            'data' => []
        ]);

    }
}
