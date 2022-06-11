<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table ='pemeliharaan';
    protected $primaryKey = 'id';

    protected $fillable =[
        'tgl_pemeliharaan',
        'jumlah',
        'status',
        'user_id',
        'barang_id'
    ];

    public function barang(){
        return $this->hasMany(Barang::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
