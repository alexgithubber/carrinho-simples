<?php

namespace App\Http\Controllers;

class CarrinhoController extends Controller
{

    public function index()
    {
        return view('carrinho.carrinho');
    }

    public function checkout()
    {
        return view('carrinho.checkout');
    }

}
