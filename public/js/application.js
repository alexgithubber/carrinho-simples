angular.module("cart", ['ngStorage'])
        .config(function ($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        })
        .controller("CarrinhoController", ["$scope", "$http", "$localStorage", "$sessionStorage", function ($scope, $http, $localStorage, $sessionStorage) {
                $scope.produto = null;
                $scope.checkoutData = {};

                $scope.$storage = $sessionStorage.$default({
                    searchParam: '',
                    searchResult: [],
                    cart: [],
                    cartTotalValue: 0
                });

                $scope.isInCart = function (id) {
                    for (var i = 0, t = $scope.$storage.cart.length; i < t; i++) {
                        if (id == $scope.$storage.cart[i].id) {
                            return true;
                        }
                    }

                    return false;
                };

                $scope.cartAdd = function () {
                    $scope.$storage.cart.push({
                        id: $scope.produto.id,
                        name: $scope.produto.nome,
                        amount: 1,
                        price: $scope.produto.preco,
                        totalPrice: $scope.produto.preco,
                        image: $scope.produto.imagem,
                        description: $scope.produto.descricao
                    });

                    $scope.$storage.cartTotalValue += $scope.produto.preco;
                };

                $scope.updateItemValues = function (item) {
                    if (item.amount == undefined) {
                        item.amount = 1;
                    }

                    item.totalPrice = item.price * item.amount;
                    $scope.updateCartTotal();
                };

                $scope.updateCartTotal = function () {
                    var totalValue = 0;

                    for (var index in $scope.$storage.cart) {
                        totalValue += $scope.$storage.cart[index].totalPrice;
                    }

                    $scope.$storage.cartTotalValue = totalValue;
                };

                $scope.cartRemove = function (item) {
                    var index = $scope.$storage.cart.indexOf(item);
                    $scope.$storage.cart.splice(index, 1);
                    $scope.$storage.cartTotalValue -= item.totalPrice;
                };

                $scope.checkoutSubmit = function () {
                    $scope.checkoutData.totalValue = $scope.$storage.cartTotalValue;

                    $http({
                        method: 'POST',
                        url: '/pedido',
                        headers: {'Content-Type': "application/json"},
                        data: {order: $scope.checkoutData, items: $scope.$storage.cart}
                    }).then(function (response) {
                        if (response.data.status != 'success') {
                            console.log(response.data.error);
                            $('#failedModal').modal('show');
                        } else {
                            $scope.$storage.$reset({
                                cart: [],
                                cartTotalValue: 0
                            });

                            $('#successModal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        }
                    }, function (error) {
                        console.log(error);
                        $('#failedModal').modal('show');
                    });
                };

                $scope.search = function (url) {
                    delete $sessionStorage.searchParam;
                    delete $sessionStorage.searchResult;

                    var param = $('#search').val();

                    $http({
                        method: 'POST',
                        url: '/pesquisar',
                        headers: {'Content-Type': "application/json"},
                        data: {search: param}
                    }).then(function (response) {
                        $('#search').val('');

                        if (response.data.status == 'success') {
                            $scope.$storage.searchParam = param;
                            $scope.$storage.searchResult = response.data.result;
                            window.location.href = "/pesquisa/resultado";
                        } else {
                            alert('Falha ao executar pesquisa!');
                        }
                    }, function (error) {
                        $('#search').val('');
                        alert('Falha ao executar pesquisa!');

                        console.log(error);
                    });
                };
            }
        ]);


