<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\SecondCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Category List Page
    public function categoryList()
    {
        $main = MainCategory::when(request('searchMainData'), function ($query) {
            $query->where('main_categories.name', 'like', '%' . request('searchMainData') . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate('5');

        $second = SecondCategory::select('second_categories.*', 'main_categories.name as main_name')
            ->leftJoin('main_categories', 'main_categories.id', 'second_categories.main_category_id')
            ->when(request('searchSecData'), function ($query) {
                $query->orWhere('second_categories.name', 'like', '%' . request('searchSecData') . '%')
                    ->orWhere('main_categories.name', 'like', '%' . request('searchSecData') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate('5');

        $main->appends(request()->all());
        $second->appends(request()->all());

        return view('admin.category.categoryList', compact('main', 'second'));
    }

    // Add Category Page
    public function addMainCategoryPage()
    {

        return view('admin.category.addMainCategory');
    }

    // Add Main Category create
    public function addMainCategory(Request $request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:main_categories,name',
        ])->validate();

        $data = ['name' => $request->categoryName];

        MainCategory::create($data);
        return redirect()->route('admin#categoryList');
    }

    // Add Second Category Page
    public function addSecCategoryPage()
    {
        $main = MainCategory::get();
        return view('admin.category.addSecCategory', compact('main'));
    }

    // Create Second Category
    public function addSecCategory(Request $request)
    {
        $this->secondCategoryValidationCheck($request);
        $createData = $this->secondCategoryData($request);
        // dd($createData);
        SecondCategory::create($createData);

        return redirect()->route('admin#categoryList');
    }

    // Delete Main Categories
    public function deleteMainCategory($id)
    {
        MainCategory::where('id', $id)->delete();
        return back();
    }
    // Delete Second Categories
    public function deleteSecCategory($id)
    {
        SecondCategory::where('id', $id)->delete();
        return back();
    }

    // Edit Main Category Page
    public function editMainCategoryPage($id)
    {
        $main = MainCategory::where('id', $id)->first();
        return view('admin.category.editMain', compact('main'));
    }
    // Update Mian Category
    public function updateMainCategory(Request $request, $id)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:main_categories,name,' . $id,
        ])->validate();

        $data = ['name' => $request->categoryName];

        MainCategory::where('id', $id)->update($data);
        return redirect()->route('admin#categoryList');
    }

    // edit Second Category Page
    public function editSecCategoryPage($id)
    {
        $main = MainCategory::get();
        $second = SecondCategory::where('id', $id)->first();
        return view('admin.category.editSec', compact('main', 'second'));
    }

    // Update Second Category
    public function updateSecCategory(Request $request, $id)
    {
        $this->secondCategoryValidationCheck($request);
        $data = $this->secondCategoryData($request);

        SecondCategory::where('id', $id)->update($data);
        return redirect()->route('admin#categoryList');
    }

    // private function GROUP
    // Second Category Validation Check
    private function secondCategoryValidationCheck($request)
    {
        Validator::make($request->all(), [
            'firstCategory' => 'required',
            'secCategory' => 'required|unique:second_categories,name,' . $request->secondCategoryId,
        ], [
            'firstCategory.required' => 'Need to Choose Main Category',
            'secCategory.required' => 'Need to Fill Second Category Name',
            'secondCategory.unique' => 'This Second Category name has already been taken',

        ])->validate();

    }

    // Second Category Data
    private function secondCategoryData($request)
    {
        return [
            'main_category_id' => $request->firstCategory,
            'name' => $request->secCategory,
        ];
    }

}
