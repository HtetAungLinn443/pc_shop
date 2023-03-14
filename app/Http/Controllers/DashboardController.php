<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    // Dashboard
    public function adminDashboard()
    {
        $data = Product::get();

        if (Product::get() != null) {
            $allProducts = Product::select('price', 'stock_count')->get();
        } else {
            $allProducts = 0;
        }
        $allProducts = Product::select('price', 'stock_count')->get();

        // for total sale
        $eachAmount = Order::select('total_amount')
            ->where('status', '1')
            ->get();
        // dd($eachAmount);
        $totalSale = 0;
        foreach ($eachAmount as $each) {
            $totalSale += $each->total_amount;
        }

        // For Total Expenses
        $totalExpenses = 0;

        foreach ($allProducts as $allProduct) {
            $totalExpenses += $allProduct->price * $allProduct->stock_count;
        }
        if ($totalExpenses != 0) {
            $Expenses = $totalSale / $totalExpenses;
        } else {
            $Expenses = $totalSale / 1;

        }
        $ExpensesPercent = 100 - floor($Expenses * 100);
        $totalSalePercent = floor($Expenses * 100);
        $ExpensesPercent = 0;
        $totalSalePercent = 0;
        // For Income

        $orderSuccessCount = Order::where('status', '1')->count();
        $totalIncome = $orderSuccessCount * 5;

        $orders = Order::select('orders.*', 'products.name as product_name', 'products.mainId')
            ->leftJoin('products', 'products.id', 'orders.product_id')
            ->orderBy('orders.id', 'desc')
            ->where('orders.status', '0')
            ->take(5)
            ->get();

        return view('admin.dashboard.homePage', compact('orders', 'totalSale', 'totalExpenses', 'ExpensesPercent', 'totalSalePercent', 'totalIncome'));
    }
}
