<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_JenisMelon extends Model
{
    protected $table = 'jenis_melon';
    protected $primaryKey = 'id_jenismelon';
    public $timestamps = false;
    protected $fillable = ['jenismelon', 'masa_panen', 'masa_pupuk', 'keterangan' ];
}