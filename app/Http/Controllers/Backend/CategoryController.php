<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::with(["parentCategory:id"])->paginate(5);
        //$categories = Category::with(["parentCategory:id"]);
     // dd($category->all());
        return view('backend.pages.category.index', compact('category'));
    }

    public function create()
    {
        $category = Category::where('parent_id','=','0')->get();
        return view ('backend.pages.category.create',compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $data = new Category();
        $data->parent_id = $request->parent_id  ;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        dd($request->all());
        if ($data->save()){
            return redirect()->back()->with('success','Category əlave edildi');
        }else {
            return redirect()->back()->with('error','Xəta baş verdi categoryəlavə edilmədi');
        }

    }
    public function edit(Request $request)
    {
        $categoryList = Category::all();
        $categoryID = $request->id;
        $category = Category::where("id", $categoryID)->first();
        //dd($request->all());
        return view ('backend.pages.category.edit', compact('category','categoryList'));
    }


    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->parent_id = $request->parent_id;
        $category->title = $request->title;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $category->status = $request->status ? 1 : 0;
        if ($category->save())
        {
            return redirect()->back()->with('success','Kateqoriya redaktə edildi');
        }else{
            return redirect()->back()->with('error','Xəta baş verdi kateqoriya redaktə edilmədi');
        }
    }

    public function destroy( Request $request)
    {
        $request->validate(['id' => ['required', 'integer', "exists:categories"]]);
        $categoryID = $request->id;
        Category::where("id", $categoryID)->delete();
        return redirect()->route('backend.category.index')->with('success', 'Category silindi');
    }

}
