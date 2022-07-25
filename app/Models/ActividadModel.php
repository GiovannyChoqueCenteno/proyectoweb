<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadModel extends Model
{
    use HasFactory;
    protected $table = 'actividad';
    protected $fillable = ['nombre', 'fecha','idcronograma'];
    public $timestamps = false;
}
