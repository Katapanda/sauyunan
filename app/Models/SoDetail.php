<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoDetail extends Model
{
    protected $table = 'so_detail';
    protected $fillable = ['nama', 'nip', 'id_so'];
}
