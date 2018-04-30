<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $fillable = ['judul_album', 'keterangan_kegiatan', 'tanggal_publish'];


    public function detailalbum()
    {
    	return $this->hasMany('App\Models\DetailAlbum','id_album');
    }
}
