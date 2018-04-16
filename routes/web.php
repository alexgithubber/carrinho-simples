<?php

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

Route::get('/', 'IndexController@index');
Route::get('/produtos/{id}', 'IndexController@detalheProduto');
Route::get('/produtos/categoria/{id}', 'IndexController@buscarCategoria');
Route::post('/pesquisar', 'IndexController@pesquisar');
Route::get('/pesquisa/resultado', 'IndexController@resultadoPesquisa');
Route::get('/carrinho', 'CarrinhoController@index');
Route::get('/carrinho/checkout', 'CarrinhoController@checkout');
Route::post('/pedido', 'PedidoController@efetuarPedido');

