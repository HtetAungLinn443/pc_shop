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
        $main = MainCategory::orderBy('name', 'asc')->get();
        $allProducts = Product::orderBy('sale_count', 'desc')->take(10)->get();
        $bestDeal = Product::orderBy('price', 'desc')->groupBy('second_category')->take(9)->get();
        $homeProducts = Product::where('main_category', 'Smart Home')->take(8)->get();
        $newProducts = Product::orderBy('id', 'desc')->take(10)->get();
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.home.homePage', compact('main', 'allProducts', 'bestDeal', 'homeProducts', 'newProducts', 'cart'));
    }

    // filter main Category
    public function filterCategory($name)
    {
        $filterCategory = Product::where('main_category', $name)->paginate(10);
        $mainCategory = MainCategory::orderBy('name', 'asc')->get();

        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.filterCategory.filterCategory', compact('filterCategory', 'mainCategory', 'cart'));
    }
    // Filter Second Category
    public function filterSecondCategory($name)
    {
        $filterCategory = Product::where('second_category', $name)->paginate(10);
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();

        return view('user.filterCategory.searchProduct', compact('cart', 'filterCategory'));
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
        })->paginate(10);

        $mainCategory = MainCategory::orderBy('name', 'asc')->get();
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
