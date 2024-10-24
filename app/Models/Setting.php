<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value',
        'image'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
