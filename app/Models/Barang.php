<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table ='barang';
    protected $primaryKey = 'id';

    protected $fillable =[
        'kode_barang',
        'foto_barang',
        'nama_barang',
        'stok',
        'kategori_id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
