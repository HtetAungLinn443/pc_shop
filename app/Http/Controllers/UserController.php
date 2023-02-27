<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductOtherData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function homePage()
    {
        $main = MainCategory::get();
        $allProducts = Product::orderBy('id', 'asc')->take(10)->get();
        $bestDeal = Product::orderBy('price', 'desc')->take(9)->get(); //->groupBy('second_category') to add
        $homeProducts = Product::where('main_category', 'Smart Home')->take(8)->get();
        $newProducts = Product::orderBy('id', 'desc')->take(9)->get();
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.home.homePage', compact('main', 'allProducts', 'bestDeal', 'homeProducts', 'newProducts', 'cart'));
    }

    // filter Category
    public function filterCategory($name)
    {
        $filterCategory = Product::where('main_category', $name)->get();
        $mainCategory = MainCategory::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.filterCategory.filterCategory', compact('filterCategory', 'mainCategory', 'cart'));
    }

    // Product Details
    public function productDetails($id)
    {
        $data = Product::where('id', $id)->first();
        $mainId = $data->mainId;
        $otherData = ProductOtherData::where('mainId', $mainId)->get();
        $relative = Product::where('second_category', $data->second_category)->take(10)->get();
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.home.details', compact('data', 'otherData', 'relative', 'cart'));
    }

    // Search Product
    public function searchProduct(Request $request)
    {
        $filterCategory = Product::when(request('searchData'), function ($query) {
            $query->orWhere('products.name', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.brand_name', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.main_category', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.second_category', 'like', '%' . request('searchData') . '%');
        })->get();

        $mainCategory = MainCategory::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        return view('user.filterCategory.searchProduct', compact('filterCategory', 'mainCategory', 'cart'));
    }
    // privacyPolicy
    public function privacyPolicy()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.help.privacyPolicy', compact('cart'));
    }

    // Team And Condition
    public function teamAndCondition()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.help.teamAndCondition', compact('cart'));
    }
}
