<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    use HasFactory;

    protected $table = 'penyusutan';

    protected $fillable = [
        'user_id',
        'barang_id',
        'ruangan_id',
        'supplier_id',
        'tgl_keluar',
        'jumlah'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }
}
