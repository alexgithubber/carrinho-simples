@extends('layouts.main')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="checkout">
                <div class="box">
                    <form id="checkoutForm" name="checkoutForm" role="form" ng-submit="checkoutSubmit()">
                        {{ csrf_field() }}
                        <h1>Checkout</h1>
                        <br>
                        <h3>Dados do Cliente</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Nome</label>
                                    <input id="firstname" type="text" ng-model="checkoutData.firstname" required class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Sobrenome</label>
                                    <input id="lastname" type="text" ng-model="checkoutData.lastname" required class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input id="address" type="text" ng-model="checkoutData.address" required class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="zip">CEP</label>
                                    <input id="zip" type="text" ng-model="checkoutData.zip" required minlength="9" class="form-control cep">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="province">Cidade</label>
                                    <input id="province" type="text" ng-model="checkoutData.province" required class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="state">Estado</label>
                                    <input id="state" type="text" ng-model="checkoutData.state" required class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input id="phone" type="text" ng-model="checkoutData.phone" required minlength="13" maxlength="14" class="form-control telefone">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" ng-model="checkoutData.email" required class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="site">Site</label>
                                    <input id="site" type="text" ng-model="checkoutData.site" class="form-control">
                                </div>
                            </div>
                        </div>

                        <h3>Formas de Entrega</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box shipping-method">
                                    <h4>Normal</h4>
                                    <p>- Até 5 dias úteis após a postagem do pedido.</p>
                                    <p>- Em horário comercial (das 8:00 ás 18:00 hs) de segunda á sexta-feira.</p>
                                    <div class="box-footer text-center">
                                        <input type="radio" name="delivery" ng-model="checkoutData.delivery" required value="normal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box shipping-method">
                                    <h4>Express</h4>
                                    <p>- Até 4 dias úteis após a postagem do pedido.</p>
                                    <p>- Em horário comercial (das 8:00 ás 18:00 hs) de segunda á sexta-feira.</p>
                                    <div class="box-footer text-center">
                                        <input type="radio" name="delivery" ng-model="checkoutData.delivery" required value="express">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Formas de Pagamento</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box payment-method">
                                    <h4>Cartão</h4>
                                    <p>Apenas <b>VISA</b> ou <b>Mastercard</b></p>
                                    <div class="box-footer text-center">
                                        <input type="radio" name="payment" ng-model="checkoutData.payment" required value="creditCard">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">
                                    <img src="{{ asset('images/pay-pal.jpg') }}" alt="" width="130">
                                    <div class="box-footer text-center">
                                        <input type="radio" name="payment" ng-model="checkoutData.payment" required value="paypal">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ url('/carrinho') }}" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Voltar ao carrinho
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Efetuar Pedido
                                    <i class="fa fa fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Resumo do Pedido</h2>
                    </div>
                    <div class="panel-body" ng-cloak>
                        <p class="text-muted">Entrega e custos adicionais são calculados de acordo com os valores informados.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <th><% $storage.cartTotalValue | currency %></th>
                                    </tr>
                                    <tr>
                                        <td>Taxa</td>
                                        <th>R$ 0,00</th>
                                    </tr>
                                    <tr class="total">
                                        <td><b>Total</b></td>
                                        <th><% $storage.cartTotalValue + custoEntrega | currency %></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="failedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="failedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Falha no pedido</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <br>
                        <img src="{{ asset('images/error-icon.png') }}" width="100">
                        <br><br>
                        <p><b>Não foi possível realizar o pedido.</b></p>
                        <p>Por favor, tente novamente mais tarde.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="successModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pedido realizado</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <br>
                        <img src="{{ asset('images/success-icon.png') }}" width="50">
                        <br><br>
                        <p><b>Pedido efetuado com sucesso!</b></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="orderSuccessBtn" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection