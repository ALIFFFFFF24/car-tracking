<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tujuan',
        'checkpoint1',
        'checkpoint2',
        'checkpoint3',
        'checkpoint4',
        'checkpoint5',
    ];
}
