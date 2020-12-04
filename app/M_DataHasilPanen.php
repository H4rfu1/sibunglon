<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DataHasilPanen extends Model
{
    protected $table = 'hasil_panen';
    protected $primaryKey = 'id_hasilpanen';
    public $timestamps = false;
    protected $fillable = ['id_jenismelon', 'id_greenhouse', 'jumlah_hasilpanen', 'tanggal_hasilpanen', 'id_akun'];
}