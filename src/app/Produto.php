<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','fornecedor_id','descricao','peso','unidade_id','quantidade'];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }
    public function pedidos(){
        return $this->belongsToMany('App\Pedido','pedidos_produtos','produto_id','pedido_id');
        //return $this->belongsToMany('App\Produtos');
    }


}
