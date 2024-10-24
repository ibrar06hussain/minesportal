<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Specify the table name if it's not the plural of the model name
    protected $table = 'categories';

    // Define which fields can be mass assignable
    protected $fillable = [
        'category_id', 
        'category_name', 
        'parent_id', 
        'category_detail'
    ];

    // If your primary key isn't 'id', specify it
    protected $primaryKey = 'category_id';

    // Disable auto-incrementing if it's not applicable
    public $incrementing = false;

    // Disable timestamps if the table doesn't have them
    public $timestamps = false;
}
