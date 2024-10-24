<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Specify the table name (if different from the plural of the model name)
    protected $table = 'areas';

    // Define the primary key field (if it's not the default 'id')
    protected $primaryKey = 'AreaID';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'AreaID', 'AreaName', 'District', 'DistrictName', 'Tehsil', 'TehsilName', 'UCName', 'UC'
    ];

    // If the table doesn't have created_at and updated_at timestamps
    public $timestamps = false;
}
