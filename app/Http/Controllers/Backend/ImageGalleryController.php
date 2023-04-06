<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\Product;
use http\Env\Request;

class ImageGalleryController extends Controller
{

    public function index($pid)
    {



        $data = Product::find($pid);
        $image = ImageGallery::where('product_id',$pid);
        $images = ImageGallery::paginate(5);
        return view ('backend.pages.image.index', compact('data', 'image', 'images'));


    }




    public function create($pid)
    {


    }



    public function store(Request $request, $pid)

    {

        return view ('backend.pages.images.create');

    }



    public function delete()

    {

        return view ('backend.pages.images.index');

    }

}
