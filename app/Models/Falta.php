<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    use HasFactory;
    protected $table = 'faltas';
    protected $fillable = ['empresa_id','funcionario_id','data','anexo','motivo'];
}

