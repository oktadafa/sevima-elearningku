<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabPelajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'judul';
    }

    public function mapel()
    {
    return $this->belongsTo(Mapel::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
