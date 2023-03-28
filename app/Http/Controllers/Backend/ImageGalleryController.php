<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\Product;

class ImageGalleryController extends Controller
{
    public function index($pid)
    {
        $data = Product::find($pid);
        $image = ImageGallery::where('product_id',$pid);
        $images = ImageGallery::paginate(5);
        return view ('backend.pages.images.index', compact('data', 'image', 'images'));
    }



    public function create($pid)
    {

        return view ('backend.pages.images.create');

    }



    public function store()

    {

        return view ('backend.pages.images.create');

    }



    public function delete()

    {

        return view ('backend.pages.images.index');

    }

}
