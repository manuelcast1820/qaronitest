<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'languages';
    protected $guarded = ['id'];
    protected $appends = [];
    protected $fillable = [
        
    ];

    protected $casts = [
    ];

    
}
