<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronogramaModel extends Model
{
    use HasFactory;
    protected $table = 'cronograma';
    protected $fillable = ['fecha' , 'idperiodo'];
    public $timestamps = false;
}
