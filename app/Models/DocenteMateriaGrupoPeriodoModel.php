<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteMateriaGrupoPeriodoModel extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'docentemateriagrupoperiodo';
    protected $fillable = ['codigo', 'idmateria', 'idgrupo', 'idperiodo', 'codigoauxiliar'];
    public $timestamps = false;
}
