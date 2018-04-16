@extends('layouts.main')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('produtos.categorias-partial')
            </div>
            <div class="col-md-9">
                <div class="row equal-height" ng-if="$storage.searchResult.length" ng-cloak>
                    <div ng-repeat="produto in $storage.searchResult" class="col-md-4">
                        <div class="thumbnail">
                            <img ng-src="{{ asset('images/produtos/') }}/<% produto.imagem %>" alt="" class="img-fullsize">
                            <div class="caption">
                                <h3><% produto.nome %></h3>
                                <p class="flex-text"><% produto.descricao %></p>
                                <p class="text-center">
                                    <a href="{{ url('/produtos/')}}/<% produto.id %>" class="btn btn-warning" role="button">Ver produto</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>

@endsection