<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(20);
        //dd($product->all());
        return view('backend.pages.product.index', compact('product'));
    }


    public function create()
    {
        //$product = Product::get();
        $category = Category::with('children')->orderBy('title','DESC')->get();
        return view('backend.pages.product.create', compact( 'category'));
    }


    public function store(ProductRequest $request)

    {
        $data = new Product();
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        /*
                 if(!is_null($request->image))
                 {
                     $imageFile = $request->file("image");
                     $originalName = $imageFile->getClientOriginalName();
                     $originalExtension = $imageFile->getClientOriginalExtension();
                     $explodeName = explode(".", $originalName)[0];
                     $fileName = ($explodeName) . "." . $originalExtension;
                     $folder = "product";
                     $publicPath = "storage/" . $folder;
                     if (file_exists(public_path($publicPath . $fileName)))
                     {
                         dd($request->all());
                         return redirect()
                             ->back()
                             ->withErrors([
                                 'image' => "Eyni şəkil daha əvvəl yüklənib."
                             ]);
                     }
                 }
        */

        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->detail = $request->detail;
        $data->status = $request->status;
        // dd($request->all());
        if ($data->save()) {
            return redirect()->back()->with('success', 'Product əlave edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi Product əlavə edilmədi');
        }
    }


    public function edit(Request $request,$id)
    {
        $product = Product::find($id);
        $category = Category::with('children')->get();
        return view ('backend.pages.product.edit', compact('product','category'));
    }



    public function update(ProductRequest $request,$id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->detail = $request->detail;
        $data->status = $request->status;
        //dd($request->all());
        if ($data->save()) {
            return redirect()->back()->with('success', 'Product əlave edildi');
        } else
        {
            return redirect()->back()->with('error', 'Xəta baş verdi Product əlavə edilmədi');
        }
        return view ('backend.pages.product.index');

    }

    public function delete( Request $request)
    {
        //$request->validate(['id' => ['required', 'integer', "exists:products"]]);
        //dd($request->all());
        $productId = $request->id;
        Product::where("id", $productId)->delete();
        //dd($request->all());
        return redirect()->route('backend.product.index')->with('success', 'Product silindi');
    }

}
