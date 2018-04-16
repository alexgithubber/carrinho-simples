<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;
use App\Produto;

class IndexController extends Controller
{

    private $categorias;

    public function __construct()
    {
        $this->categorias = Categoria::all();
    }

    public function index()
    {
        $resultSet = Produto::take(30)->get();
        $produtos = $this->stripDescricao($resultSet);

        return view('index', ['categorias' => $this->categorias, 'produtos' => $produtos]);
    }

    public function buscarCategoria($categoriaId)
    {
        $resultSet = Produto
            ::join('categorias_produtos', 'categorias_produtos.idProduto', '=', 'produtos.id')
            ->where('categorias_produtos.idCategoria', $categoriaId)
            ->get();

        $produtos = $this->stripDescricao($resultSet);

        return view('index', ['categorias' => $this->categorias, 'produtos' => $produtos, 'catId' => $categoriaId]);
    }

    public function detalheProduto($id)
    {
        $produto = Produto::find($id);

        $caracteristicas = DB::table('caracteristicas_produtos')
            ->join('caracteristicas', 'caracteristicas.id', '=', 'caracteristicas_produtos.idCaracteristica')
            ->select('caracteristicas.nome as descricao', 'caracteristicas_produtos.valor as valor')
            ->where('idProduto', $produto->id)
            ->get();

        $produto->caracteristicas = $caracteristicas;

        return view('produtos.detalhe', ['categorias' => $this->categorias, 'produto' => $produto]);
    }

    public function pesquisar(Request $request)
    {
        if ($request->exists('search') && !empty($request->input('search'))) {
            $searchParam = strip_tags($request->input('search')); //remove tags html, php, etc..
            $searchParam = preg_replace('/[^\p{L}\p{N}\s]/u', '', $searchParam); //remove caracteres especiais

            $resultSet = [];

            try {
                $resultSet = Produto::where('nome', 'like', '%' . $searchParam . '%')
                    ->orWhere('descricao', 'like', '%' . $searchParam . '%')
                    ->orderBy('id', 'asc')
                    ->get();

                $resultSet = $this->stripDescricao($resultSet);
            } catch (\Exception $ex) {
                return response()->json(['status' => 'failed']);
            }
            return response()->json([
                    'status' => 'success',
                    'result' => $resultSet
            ]);
        } else {
            return redirect('/');
        }
    }

    public function resultadoPesquisa()
    {
        return view('pesquisa', ['categorias' => $this->categorias]);
    }

    protected function stripDescricao($produtos)
    {
        foreach ($produtos as $produto) {
            $produto->descricao = substr($produto->descricao, 0, 50) . "...";
        }

        return $produtos;
    }

}
