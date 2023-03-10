<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birthday', 'nationality'];

    public function media(){
        return $this->belongsToMany('App\Models\Media');
    }
}
