<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nama_perusahaan',
        'alamat'
    ];

    public function pengadaan(){
        return $this->hasMany(Pengadaan::class);
    }
}
