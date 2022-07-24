<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoconvocatoriaModel extends Model
{
    use HasFactory;
    protected $table = 'tipoconvocatoria';
    protected $fillable = ['nombre'];
}
