<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PrincipalController@principal')->middleware('log.acesso')->name('site.index');

Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato','ContatoController@contato')->name('site.contato');

Route::post('/contato','ContatoController@salvar')->name('site.contato');

Route::get('/login','LoginController@index')->name('site.login');

Route::post('/login','LoginController@autenticar')->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function(){
    Route::get('/home','HomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor','FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}','FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}','FornecedorController@excluir')->name('app.fornecedor.excluir');
    Route::resource('produto','ProdutoController');
    Route::resource('produto-detalhe','ProdutoDetalheController');
});

Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');
/*Route::get('/rota1',function(){
    echo "rota 1";
})->name('site.rota1');*/

/*Route::get('/rota2',function(){
   return redirect()->route('site.rota1');
})->name('site.rota2');*/

Route::fallback(function(){
   echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique</a> aqui para ir pra pagina inicial';
});
//Route::redirect('/rota2','/rota1');
/*Route::get('/contato/{nome}/{categoria_id}',
    function(string $nome, int $categoria_id){
        echo "Eu sou $nome da categoria de $categoria_id";
    }
)->where('nome','[A-z]+')->where('categoria_id','[0-9]+');*/