@extends('layouts.main')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover" ng-cloak>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-center">Preço Unitário</th>
                            <th class="text-center">Total</th>
                            <th style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="cartItem in $storage.cart">
                            <td class="col-md-1 col-sm-1">
                                <img class="media-object" ng-src="images/produtos/<% cartItem.image %>" style="width: 72px; height: 72px;">
                            </td>
                            <td class="col-md-5 col-sm-1">
                                <h4 class="media-heading"><% cartItem.name %></h4>
                            </td>
                            <td class="col-md-1 col-sm-1 text-center">
                                <input type="number" min="1" ng-model="cartItem.amount" ng-change="updateItemValues(cartItem)" class="form-control">
                            </td>
                            <td class="col-md-3 col-sm-1 text-center"><strong><% cartItem.price | currency %></strong></td>
                            <td class="col-md-1 col-sm-1 text-center"><strong><% cartItem.totalPrice | currency %></strong></td>
                            <td class="col-md-1 col-sm-1 text-center">
                                <button type="button" ng-click="cartRemove(cartItem)" class="btn btn-danger">
                                    <span class="fa fa-close"></span> Remover
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3></td>
                            <td class="text-right">
                                <h3><strong><% $storage.cartTotalValue | currency %></strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{ url('/') }}" role="button" class="btn btn-default">
                                    <span class="fa fa-shopping-cart"></span> Continuar comprando
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/carrinho/checkout') }}" role="button" class="btn btn-info"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Ir para Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection