<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DataHasilPanen extends Model
{
    protected $table = 'hasil_panen';
    protected $primaryKey = 'id_hasilpanen';
    public $timestamps = false;
    protected $fillable = ['id_data_perawatan', 'persentase_panen', 'status', 'jumlah_hasilpanen', 'jumlah_gagalpanen', 'tanggal_hasilpanen', 'id_akun'];
}