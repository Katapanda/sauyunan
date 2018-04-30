<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontaks';
    protected $fillable = ['telepon', 'fax', 'email', 'lokasi', 'status_aktif'];
}
