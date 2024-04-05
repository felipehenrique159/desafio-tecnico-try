<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    public $table = 'vendas';

    public $timestamps = false;

    protected $fillable = [
        'id_vendedor',
        'comissao',
        'valor_da_venda',
        'data_da_venda'
    ];

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor', 'id');
    }
}
