<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DetailPerawatan extends Model
{
    protected $table = 'detail_perawatan';
    protected $primaryKey = 'id_detail_perawatan';
    public $timestamps = false;
    protected $fillable = ['id_data_perawatan', 'perawatan', 'tanggal_perawatan', 'status'];
}
