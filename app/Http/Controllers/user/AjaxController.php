<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //add to card
    public function addToCard(Request $request)
    {
        $originalSaleCount = Product::where('id', $request->product_id)->first();
        $saleCount = [
            'sale_count' => $originalSaleCount->sale_count + 1,
        ];
        Product::where('id', $request->product_id)->update($saleCount);
        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'count' => $request->count,
        ];

        Cart::create($data);

        $response = [
            'status' => 'success',
        ];
        return response()->json($response, 200);
    }

    // order
    public function order(Request $request)
    {

        foreach ($request->all() as $item) {
            $data = Order::create([
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'count' => $item['count'],
                'total_amount' => $item['total_amount'],
                'order_code' => $item['order_code'],
            ]);
            $stockCount = Product::select('stock_count')->where('id', $item['product_id'])->first();
            $reductCount = $stockCount->stock_count - $item['count'];
            Product::where('id', $item['product_id'])->update(['stock_count' => $reductCount]);
        }

        Cart::where('user_id', Auth::user()->id)->delete();
        return response()->json([
            'status' => 'true',
        ], 200);

    }
}
