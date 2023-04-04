<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategory ()
    {
        $categories = Category::all();
        return view('backend.category.show-category', compact('categories'));
    }

    public function createCategory ()
    {
        return view('backend.category.create-category');
    }

    public function storeCategory (CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->price = $request->price;
        $category->worker_earning = $request->worker_earning;

        $category->save();
        return redirect('admin/categories')->with('Success', 'Category is added successfully!');
    }

    public function inactiveCategory ($id)
    {
        $category = Category::find($id);
        $category->status = false;
        $category->save();
        return redirect()->back()->with('success', 'Inactivated successfully!');
    }

    public function activeCategory ($id)
    {
        $category = Category::find($id);
        $category->status = true;
        $category->save();
        return redirect()->back()->with('success', 'Activated successfully!');
    }
}
