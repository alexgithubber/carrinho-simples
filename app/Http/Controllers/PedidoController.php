<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoProduto;

class PedidoController extends Controller
{

    public function efetuarPedido(Request $request)
    {
        $data = $request->all();

        $validator = \Validator::make($data['order'], [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'zip' => 'required',
                'province' => 'required',
                'state' => 'required',
                'delivery' => 'required',
                'payment' => 'required',
                'totalValue' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 'failed', 'error' => $validator->errors()->all()]);
        }

        try {
            $pedido = new Pedido;
            $pedido->cli_nome = $data['order']['firstname'];
            $pedido->cli_sobrenome = $data['order']['lastname'];
            $pedido->cli_email = $data['order']['email'];
            $pedido->cli_site = $data['order']['site'] ?? null;
            $pedido->cli_telefone = $data['order']['phone'];
            $pedido->cli_end_endereco = $data['order']['address'];
            $pedido->cli_end_cep = $data['order']['zip'];
            $pedido->cli_end_cidade = $data['order']['province'];
            $pedido->cli_end_estado = $data['order']['state'];
            $pedido->formaEntrega = $data['order']['delivery'];
            $pedido->formaPagamento = $data['order']['payment'];
            $pedido->valorTotal = $data['order']['totalValue'];

            $pedido->save();

            if ($pedido->id) {
                foreach ($data['items'] as $item) {
                    $produto = new PedidoProduto;
                    $produto->idPedido = $pedido->id;
                    $produto->idProduto = $item['id'];
                    $produto->quantidade = $item['amount'];
                    $produto->subtotal = $item['totalPrice'];

                    $produto->save();
                }
            }

            return response()->json(['status' => 'success'], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => 'failed', 'error' => $e->getMessage()], 500);
        }
    }

}
