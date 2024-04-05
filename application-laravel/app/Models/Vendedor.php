<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    public $table = 'vendedor';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email'
    ];

    public function comissoes()
    {
        return $this->hasMany(Vendas::class, 'id_vendedor', 'id');
    }

    public function getComissaoAttribute()
    {
        return $this->comissoes()->sum('comissao');
    }
}
