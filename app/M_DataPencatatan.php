<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_DataPencatatan extends Model
{
    
    protected $table = 'data_perawatan';
    protected $primaryKey = 'id_dataperawatan';
    public $timestamps = false;
    protected $fillable = ['*'];
}
