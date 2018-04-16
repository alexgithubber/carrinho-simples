<!DOCTYPE HTML>

<html lang="{{ app()->getLocale() }}" ng-app="cart">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <title>{{ config('app.name', 'Carrinho')}}</title>

        <link href="{{ URL::asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body ng-controller="CarrinhoController">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        <script type="text/javascript" src="{{ URL::asset('components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('components/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('components/angular/angular.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('components/angular-i18n/angular-locale_pt-br.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('components/ngstorage/ngStorage.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/application.js') }}"></script>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </body>
</html>