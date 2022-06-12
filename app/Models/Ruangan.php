<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_ruangan'
    ];

    public function pengadaan(){
        return $this->hasMany(Pengadaan::class);
    }
    
    public function penyusutan(){
        return $this->hasMany(Penyusutan::class );
    }
}
