<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'text_message'];

    public function media()
    {
        return $this->belongsToMany(Media::class,'reviews_media_user','review_id','media_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'reviews_media_user','review_id','user_id');
    }
}
