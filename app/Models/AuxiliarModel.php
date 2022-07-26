<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxiliarModel extends Model
{
    use HasFactory;
    protected $table = 'auxiliar';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['codigo'];
}
