<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Tracking extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_delivery',
        'id_tujuan',
        'checkpoint1',
        'tanggal1',
        'checkpoint2',
        'tanggal2',
        'checkpoint3',
        'tanggal3',
        'checkpoint4',
        'tanggal4',
        'checkpoint5',
        'tanggal5',
    ];
}