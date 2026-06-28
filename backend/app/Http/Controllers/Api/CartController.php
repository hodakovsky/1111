<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $items = [];
        $total = 0;

        if (!empty($cart)) {
            $products = Product::whereIn('id', array_keys($cart))->get();

            foreach ($products as $product) {
                $quantity = $cart[$product->id] ?? 0;
                $subtotal = $product->price * $quantity;

                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => round($subtotal, 2),
                ];

                $total += $subtotal;
            }
        }

        return [
            'items' => $items,
            'total' => round($total, 2),
            'count' => array_sum($cart),
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'integer|min:1',
        ]);

        $quantity = $data['quantity'] ?? 1;
        $cart = $request->session()->get('cart', []);
        $cart[$data['product_id']] = ($cart[$data['product_id']] ?? 0) + $quantity;
        $request->session()->put('cart', $cart);

        return $this->index($request);
    }

    public function destroy(Request $request, int $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }

        return $this->index($request);
    }
}
