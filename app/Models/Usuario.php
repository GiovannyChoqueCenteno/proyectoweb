<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $rememberTokenName = false;
    protected $primaryKey = 'codigo';
    protected $table = "usuario";
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'nombre', 'apellido', 'email', 'password', 'idrol'
=======
        'codigo', 'nombre', 'apellido', 'pass', 'email', 'idrol'
>>>>>>> origin/eduardo
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass'
    ];

    public $timestamps = false;

    public function getRol()
    {
        if ($this->idrol == 1) {
            return "admin";
        } elseif ($this->idrol == 2) {
            return "docente";
        }
        return "estudiante";
    }
}
