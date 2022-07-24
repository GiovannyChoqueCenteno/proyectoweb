<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoModel extends Model
{
    use HasFactory;
    protected $table = 'periodo';
    protected $fillable = [
        'id','inicio', 'fin',
    ];
    public $timestamps = false;
    
}
