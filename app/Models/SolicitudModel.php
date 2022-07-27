<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudModel extends Model
{
    use HasFactory;
    protected $primaryKey = '';
    protected $table = 'solicitud';
    protected $fillable = ['codigo', 'idmateria', 'idconvocatoria','aceptado','notaacumulada','notafinal','filecv'];
    public $timestamps = false;
}
