<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_NoGreenhouse extends Model
{
    protected $table = 'no_greenhouse';
    protected $primaryKey = 'id_greenhouse';
    public $timestamps = false;
    protected $fillable = ['no_greenhouse'];
}