<?php

namespace App\Pivots;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Collection extends Pivot
{
    protected $table = 'media_user';
    public $incrementing = true;
    //use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function media()
    {
        return $this->belongsTo('App\Models\Media');
    }
}
