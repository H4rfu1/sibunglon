<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Aksi_perawatan extends Model
{
    protected $table = 'aksi_perawatan';
    protected $primaryKey = 'id_aksi_perawatan';
    public $timestamps = false;
    protected $fillable = ['id_perawat', 'id_detail_perawatan', 'tanggal_aksi_perawatan'];
}