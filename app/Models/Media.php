<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['name_it', 'name', 'link_trailer', 'realease_date', 'avarage_rating'];

    public function genres(){
        return $this->belongsToMany('App\Models\Genre');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
    public function actors(){
        return $this->belongsToMany('App\Models\Actor');
    }
    public function reviews()
    {
        return $this->belongsToMany(Review::class,'media_review_user','media_id','review_id');
    }

}
