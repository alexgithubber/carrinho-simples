@extends('layouts.main')

@section('content')

<section>
    <div class="container" ng-init='produto = @json($produto);'>
        <div class="row">
            <div class="col-md-3">
                @include('produtos.categorias-partial')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/produtos/' . $produto->imagem) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <strong>{{ $produto->nome }}</strong>
                            </div>
                            <div class="panel-body">
                                <p><strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong></p>
                                <p>{{ $produto->descricao }}</p>
                                <div>
                                    <h4>Características:</h4>
                                    <ul>
                                        @foreach($produto->caracteristicas as $caracteristica)
                                        <li><b>{{ $caracteristica->descricao }}:</b> <i>{{ $caracteristica->valor }}</i></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                                <p>
                                    <a href ng-click="cartAdd()" class="btn btn-primary" ng-class="{'disabled': isInCart(<?php echo $produto->id ?>)}">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Adicionar ao Carrinho
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection