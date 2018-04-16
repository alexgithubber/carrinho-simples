<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Carrinho')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input id="search" type="search" placeholder="O que deseja encontrar?" class="form-control">
                </div>
                <button type="button" class="btn btn-info" ng-click="search();">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="pull-right" style="padding-right: 10px;">
        <a href="{{ url('/carrinho') }}" class="btn btn-primary navbar-btn" ng-class="{'disabled': !$storage.cart.length}" ng-cloak>
            <i class="fa fa-shopping-cart"></i> Carrinho: <% $storage.cart.length %> produto(s)
        </a>
    </div>
</div>