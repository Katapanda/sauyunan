<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';
    protected $fillable = ['nama', 'email', 'jabatan', 'bidang', 'sub_bidang', 'nip', 'foto'];
}
