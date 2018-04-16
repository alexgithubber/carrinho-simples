<div class="list-group">
    @foreach ($categorias as $index => $categoria)
    <a href="{{ url('/produtos/categoria/' . $categoria->id) }}" class="list-group-item <?php if ((isset($catId) && $catId != null) && $categoria->id == $catId) { ?>active<?php } ?>">{{ $categoria->nome }}</a>
    @endforeach
</div>

<div>
    <a href="{{ url('/') }}" type="button" class="btn btn-default"><i class="fa fa-close fw"></i> Limpar</a>
</div>