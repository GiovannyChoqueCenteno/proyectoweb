<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaModel extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'nota';
    protected $fillable = ['codigoestudiante', 'codigodocente','idmateria', 'idconvocatoria', 'notaconocimiento','notapedagogica','notafinal'];
    public $timestamps = false;
}
