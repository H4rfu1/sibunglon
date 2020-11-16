<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DataPencatatan extends Model
{
    
    protected $table = 'data_perawatan';
    protected $primaryKey = 'id_dataperawatan';
    public $timestamps = false;
    protected $fillable = ['id_jenismelon', 'id_greenhouse', 'tanggal_tanam', 'id_akun', 'tanggal_pemberianpupuk', 'prediksi_tanggalpanen'];
}
