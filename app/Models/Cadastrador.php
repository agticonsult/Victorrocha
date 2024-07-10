<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastrador extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'ativo'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'cadastradors';

    const ATIVO = 1;
    const INATIVO = 0;
    
}
