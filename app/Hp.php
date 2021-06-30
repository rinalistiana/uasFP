<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hp extends Model
{
    // public $guarded = [];
    protected $table = "hp";
    protected $primaryKet = "id";
    protected $fillable = [
        'id', 'merk', 'tipe', 'tahun', 'gambar','public_id'
    ];

}
