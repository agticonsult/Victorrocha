<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'telefone', 'observacao', 'reuniao', 'cep', 'endereco', 'bairro', 'numero', 'id_cadastrador', 'ativo'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'pessoas';

    const ATIVO = 1;
    const INATIVO = 0;

    //Eloquent Mutator
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = preg_replace('/[^0-9]/', '', $value);
    }

    //relaçao
    public function cadastrador()
    {
        return $this->belongsTo(Cadastrador::class, 'id_cadastrador');
    }
}
