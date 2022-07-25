<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoModel extends Model
{
    use HasFactory;
    protected $table = 'grupo';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
