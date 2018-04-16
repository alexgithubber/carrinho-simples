@extends('layouts.main')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('produtos.categorias-partial')
            </div>
            <div class="col-md-9">
                <div class="row equal-height">
                    @if(count($produtos))
                    @foreach ($produtos as $index => $produto)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('images/produtos/' . $produto->imagem) }}" alt="" class="img-fullsize">
                            <div class="caption">
                                <h3>{{ $produto->nome }}</h3>
                                <p class="flex-text">{{ $produto->descricao }}</p>
                                <p class="text-center">
                                    <a href="{{ url('/produtos/') . '/' . $produto->id}}" class="btn btn-warning" role="button">Ver produto</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <h2>Nenhum produto encontrado</h2>
                    </div>
                    @endif
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>

@endsection