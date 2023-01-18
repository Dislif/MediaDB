<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['name_it', 'name', 'link_trailer', 'realease_date'];

    public function genres(){
        return $this->belongsToMany('App\Models\Genre');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
