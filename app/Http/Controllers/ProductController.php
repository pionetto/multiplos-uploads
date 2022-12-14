<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'title'=>'required',
        ]);
        $new_product = Product::create($data);
        if($req->has('images')){
            foreach ($req->file('images')as $image){
                $imageName = $data['title'].'-imagem-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('product_images'),$imageName);
                Image::create([
                    'product_id'=>$new_product->id,
                    'image'=>$imageName
                ]);
            }
        }
        return back()->with('success', 'Added');
    }
}
