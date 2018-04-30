<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['judul_artikel', 'isi_artikel', 'foto_artikel', 'sumber_artikel'];
}
