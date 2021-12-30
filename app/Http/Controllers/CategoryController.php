<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryDescription;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('description')->get();
        return view('front.categories.list',compact('categories'));
    }

    public function create()
    {
        $category = new Category;
        return view('front.categories.create',compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->slug = $request->slug;   
        $category->save();
        $description = new CategoryDescription();
        $description->name = $request->description['name'];
        $description->language = $request->description['language'];
        $description->categoryId = $category->id;
        $description->save();
        return redirect('/categories');

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('front.categories.edit',compact('category'));
    }


    public function getCategories(Request $request){
        $categories = Category::with('description')->get();
        if ($request->search !== null) {
            $search = $request->search;
            $categories = $categories->filter(function ($item) use ($search) {
                return false !== stripos($item->name, $search);
            });
        }
        return response()->json($categories);
    }

}
