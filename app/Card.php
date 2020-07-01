<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name', 'description', 'file_url'
    ];

    public function getFileUrlAttribute($value) {
        if($value) {
            return url('/')."/uploads/".$value;
        }
    }
}
