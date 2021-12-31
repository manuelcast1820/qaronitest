<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryDescription;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryDescription::where('language',$request->language)->get(); //Category::with('description')->get();
        return view('front.categories.list',compact('categories'));
    }

    public function create()
    {
        $category = new Category;
        return view('front.categories.create',compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $datadescription = $request->only('json_description');
        $category = new Category();
        $category->slug = $request->slug;   
        $category->save();
        
        if(count(json_decode($datadescription['json_description'])) > 0){
            foreach(json_decode($datadescription['json_description']) as $item){
                $description = new CategoryDescription();
                $description->categoryId = $category->id;
                $description->language = $item->language;
                $description->name = $item->name;
                $description->save();
            }
        }

        return redirect('/categories?language='.session('lang'));

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('front.categories.edit',compact('category'));
    }

    public function update($id,CategoryRequest $request)
    {
        $datadescription = $request->only('json_description');
        $category = Category::find($id);
        $category->slug = $request->slug;   
        $category->save();
        if(count(json_decode($datadescription['json_description'])) > 0){
            foreach(json_decode($datadescription['json_description']) as $item){
                $description = new CategoryDescription();
                $description->categoryId = $category->id;
                $description->language = $item->language;
                $description->name = $item->name;
                $description->save();
            }
        }
        return redirect('/categories?language='.session('lang'));

    }


    public function getCategories(Request $request){
        $categories = CategoryDescription::where('language',$request->language)->get();
        if ($request->search !== null) {
            $search = $request->search;
            $categories = $categories->filter(function ($item) use ($search) {
                return false !== stripos($item->name, $search);
            });
        }
        return response()->json($categories);
    }

}
