<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailAlbum extends Model
{
    protected $table = 'foto_album';
    protected $fillable = ['id_album', 'foto'];

    public function album()
    {
    	return $this->belongsTo('App\Models\Album');
    }
}
