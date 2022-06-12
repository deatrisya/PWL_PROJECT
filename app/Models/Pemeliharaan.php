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

    protected $appends = [
        'statusPemeliharaan',
    ];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStatusPemeliharaanAttribute(){
        $status = $this->status;

        if ($status == 'Sedang Perbaikan') {
              $badge = '<span class="badge badge-pill badge-danger">Sedang Perbaikan</span>';
        } else {
            $badge = '<span class="badge badge-pill badge-success">Selesai Perbaikan</span>';
        }

        return $badge;
    }

}
