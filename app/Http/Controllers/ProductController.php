<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductOtherData;
use App\Models\SecondCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class ProductController extends Controller
{
    // Product List Page
    public function productListPage()
    {
        $products = Product::when(request('searchData'), function ($query) {
            $query->orWhere('products.name', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.main_category', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.second_category', 'like', '%' . request('searchData') . '%')
                ->orWhere('products.brand_name', 'like', '%' . request('searchData') . '%');

        })->orderBy('id', 'desc')->paginate('12');

        return view('admin.products.productList', compact('products'));
    }

    // Create Product Page
    public function createProductPage()
    {
        $mains = MainCategory::get();
        $seconds = SecondCategory::get();
        return view('admin.products.createProduct', compact('mains', 'seconds'));

    }

    // direct create product
    public function createProduct(Request $request)
    {
        $this->checkProductValidator($request);
        $uniqueId = 'ID_CODE-' . uniqid();

        $data = $this->insertPorductData($request);
        $data['mainId'] = $uniqueId;

        // Product Image
        $productImage = uniqid() . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public', $productImage);
        $data['product_image'] = $productImage;
        // brand Image
        $brandImage = uniqid() . $request->file('brandImage')->getClientOriginalName();
        $request->file('brandImage')->storeAs('public', $brandImage);
        $data['brand_image'] = $brandImage;

        foreach ($request->mainName as $key => $item) {
            $otherData = [
                'item' => $item,
                'mainId' => $uniqueId,
                'main' => $request->mainName[$key],
                'other_name' => $request->dataName[$key],
                'data' => $request->dataInfo[$key],
            ];
            ProductOtherData::create($otherData);
        }
        Product::create($data);
        return redirect()->route('admin#productListPage')->with(['createSuccess' => 'Product Create Successfully...']);
    }

    // product Details Page
    public function productDetails($id)
    {

        $data = Product::where('id', $id)->first();
        $mainId = $data->mainId;
        $otherData = ProductOtherData::where('mainId', $mainId)->get();
        // dd($otherData->toArray());
        return view('admin.products.details', compact('data', 'otherData'));
    }

    // productDelete
    public function productDelete($id)
    {
        $mainData = Product::where('id', $id)->first();
        ProductOtherData::where('mainId', $mainData->mainId)->delete();
        Product::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Product Delete Success...']);
    }

    // Edit Product
    public function editProduct($id)
    {
        $mains = MainCategory::get();
        $seconds = SecondCategory::get();

        $data = Product::where('id', $id)->first();
        $otherData = ProductOtherData::where('mainId', $data->mainId)->get();

        return view('admin.products.edit', compact('mains', 'seconds', 'data', 'otherData'));
    }

    // Edit Update Data
    public function editUpdateData(Request $request)
    {
        // dd($request->toArray());
        Validator::make($request->all(), [
            'productName' => 'required',
            'productImage' => 'mimes:jpg,jpeg,png',
            'price' => 'required',
            'mainCategory' => 'required',
            'secondCategory' => 'required',
            'brandName' => 'required',
            'brandImage' => 'mimes:jpg,png,jpeg',
            'pathNumber' => 'required',
            'barcode' => 'required',
            'commercialWarranty' => 'required',
            'legalWarranty' => 'required',
            'stockCount' => 'required',
            'mainName.*' => 'required',
            'dataName.*' => 'required',
            'dataInfo.*' => 'required',
        ], [
            'mainName.*.required' => 'Main need to Fill',
            'dataName.*.required' => 'Name need to Fill',
            'dataInfo.*.required' => 'Data need to Fill',
        ])->validate();

        $productData = $this->insertPorductData($request);

        // update Product Image
        if ($request->hasFile('productImage')) {
            $dbProductImg = Product::select('product_image')->where('id', $request->id)->get();

            if ($dbProductImg != null) {
                Storage::delete('public/' . $dbProductImg);
            }

            $productImgName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public', $productImgName);
            $productData['product_image'] = $productImgName;
        }

        // Update Brand Image
        if ($request->hasFile('brandImage')) {
            $dbBrandImg = Product::select('brand_image')->where('id', $request->id)->get();

            if ($dbBrandImg != null) {
                Storage::delete('public/' . $dbBrandImg);
            }

            $brandImgName = uniqid() . $request->file('brandImage')->getClientOriginalName();
            $request->file('brandImage')->storeAs('public', $brandImgName);
            $productData['brand_image'] = $brandImgName;
        }

        foreach ($request->mainName as $key => $item) {
            $otherData = [
                'item' => $item,
                'main' => $request->mainName[$key],
                'other_name' => $request->dataName[$key],
                'data' => $request->dataInfo[$key],
            ];
            ProductOtherData::where('id', $request->otherId[$key])
                ->update($otherData);
        }
        Product::where('id', $request->id)->update($productData);
        return redirect()->route('admin#productDetails', $request->id);
    }

    // check product validation
    private function checkProductValidator($request)
    {
        Validator::make($request->all(), [
            'productName' => 'required',
            'productImage' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required',
            'mainCategory' => 'required',
            'secondCategory' => 'required',
            'brandName' => 'required',
            'brandImage' => 'required|mimes:jpg,png,jpeg',
            'pathNumber' => 'required',
            'barcode' => 'required',
            'commercialWarranty' => 'required',
            'legalWarranty' => 'required',
            'stockCount' => 'required',
        ])->validate();

    }

    private function insertPorductData($request)
    {
        return [
            'name' => $request->productName,
            'price' => $request->price,
            'main_category' => $request->mainCategory,
            'second_category' => $request->secondCategory,
            'brand_name' => $request->brandName,
            'path_number' => $request->pathNumber,
            'barcode' => $request->barcode,
            'commercial_warranty' => $request->commercialWarranty,
            'legal_warranty' => $request->legalWarranty,
            'stock_count' => $request->stockCount,
        ];

    }

}
