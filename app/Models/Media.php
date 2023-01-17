<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['name_it', 'name', 'link_trailer'];

    public function genres(){
        return belongsToMany('App\Models\Genre');
    }
}
