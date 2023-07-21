<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function dataBab(){
    $data = ['BAB I', 'BAB II', 'BAB III', 'BAB IV', 'BAB V', 'BAB VI', 'BAB VII', 'BAB VIII', 'BAB IX', 'BAB X'];
    return $data;
    }

    public function bab(){
    return $this->belongsTo(BabPelajaran::class);
    }

    public function guru()
    {
    return $this->belongsTo(User::class);
    }

public function getRouteKeyName()
{
    return 'judul';
}
}
