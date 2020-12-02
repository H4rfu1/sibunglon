<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DataGagalPanen extends Model
{
    protected $table = 'gagal_panen';
    protected $primaryKey = 'id_gagalpanen';
    public $timestamps = false;
    protected $fillable = ['id_jenismelon', 'id_greenhouse', 'jumlah_gagalpanen', 'penyebab_gagalpanen', 'tanggal_gagalpanen', 'id_akun'];
}