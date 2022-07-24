<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvocatoriaModel extends Model
{
    use HasFactory;
    protected $table = 'convocatoria';
    protected $fillable = ['titulo' , 'descripcion' ,'fecha','idtipoconvocatoria','idperiodo'];
    public $timestamps = false;

}
