<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaginaModel extends Model
{
    use HasFactory;
    protected $table = 'pagina';
    protected $fillable = ['ruta', 'titulo','visitas'];
    public $timestamps = false;

}
