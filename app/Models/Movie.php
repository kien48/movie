<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'anh',
        'slug',
        'ngon_ngu',
        'so_tap',
        'chat_luong',
        'dao_dien',
        'dien_vien',
        'nam_phat_hanh',
        'quoc_gia',
        'trang_thai',
    ];

    public function catelogue()
    {
        return $this->belongsToMany(Catelogue::class, 'movie_catelogue');
    }
    public function episode()
    {
        return $this->hasMany(Episode::class);
    }
}