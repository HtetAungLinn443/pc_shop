<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Admin
    // Order List
    public function orderList()
    {
        $orders = Order::select('orders.*', 'users.email', 'products.name as product_name', 'products.*', 'orders.id as order_id')
            ->orderBy('orders.id', 'asc')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->leftJoin('products', 'products.id', 'orders.product_id')
            ->paginate('8');
        $totalDeliver = Order::where('status', '1')->count();
        $totalPanding = Order::where('status', '0')->count();
        $totalHold = Order::where('status', '2')->count();
        return view('admin.order.orderList', compact('orders', 'totalDeliver', 'totalPanding', 'totalHold'));
    }
    // order Details Page
    public function orderDetailsPage($id)
    {
        $data = Order::select('orders.*', 'users.id as user_id', 'users.name as user_name', 'users.email', 'users.address', 'users.phone', 'products.id as product_id', 'products.name as product_name', 'products.product_image', 'products.brand_name', 'products.main_category', 'products.second_category')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->leftJoin('products', 'products.id', 'orders.product_id')
            ->where('orders.id', $id)->first();

        return view('admin.order.orderDetails', compact('data'));
    }
    // Order Status Change
    public function orderStatusChange(Request $request)
    {
        Order::where('id', $request->id)->update(['status' => $request->status]);
    }
    // User
    // order list
    public function userOrderList()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        $orderList = Order::select('orders.*', 'products.*')
            ->join('products', 'orders.product_id', 'products.id')
            ->where('user_id', Auth::user()->id)->get();

        return view('user.home.orderList', compact('cart', 'orderList'));
    }
    // order history
    public function orderHistory()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        $orderList = Order::select('orders.*', 'products.*')
            ->join('products', 'orders.product_id', 'products.id')
            ->where('user_id', Auth::user()->id)
            ->where('status', '1')
            ->get();

        return view('user.home.orderHistory', compact('cart', 'orderList'));
    }
}
