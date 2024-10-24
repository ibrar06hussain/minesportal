<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;

    // Optional: Specify the table name if it's not the plural of the model name
    protected $table = 'nations';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'name',
        'code',
        'dial_code',
    ];

    // Optional: Specify the primary key if it's not `id`
    protected $primaryKey = 'id';

    // Optional: Disable timestamps if your table doesn't have created_at and updated_at
    public $timestamps = false;
}
