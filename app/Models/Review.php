<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'text_message'];

    
    public function users()
    {
        return $this->hasOneThrough(
            'App\Models\User',
            'App\Pivots\Collection',
            'user_id',
            'collection_id',
            'id',
            'id'
        );
    }
}
