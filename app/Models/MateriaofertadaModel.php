<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaofertadaModel extends Model
{
    use HasFactory;
    protected $primaryKey = ['idmateria','idconvocatoria'];

    protected $table = 'materiaofertada';
    protected $fillable = [ 'idmateria' ,'idconvocatoria'];
    public $timestamps = false;

}
