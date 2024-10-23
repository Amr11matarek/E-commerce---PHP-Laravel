<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productsController extends Controller
{
    public function index(){
        $products = product::paginate(3);
        return view('products.index',compact('products'));
    }

    public function creat(){
        $categories = Category::all();
        return view('products.creat',compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required',
            'product_img' => 'sometimes|mimes:jpg,jpeg,png,webp,bmp',
        ]);

        $uploadedFile = $request->product_img;

        $img_extension = $uploadedFile->extension();
        $img_name = time() . '.' . $img_extension;

        // Store the file in the public disk
        Storage::put("/public/product_img/$img_name", file_get_contents($uploadedFile));

        Product::create([
        'product_name' => $request->product_name,
        'product_desc' => $request->product_desc,
        'product_price' => $request->product_price,
        'product_img' => $img_name,
        'category_id' => $request->category_id
    ]);

        return redirect()->route('products.index');
    }

    public function destroy($id){

        $product = Product::find($id);
        Storage::delete("/public/product_img/$product->product_img");
        $product->delete();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('products.edit', ['categories'=>$categories,'product'=>$product]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required',
        'product_desc' => 'required',
        'product_price' => 'required',
        'product_img' => 'mimes:jpg,jpeg,png,webp,bmp'
    ]);

    $product = Product::find($id);

    $uploadedFile = $request->product_img;
    $img_name = $product->product_img;


    if($uploadedFile !== null){

        if(Storage::exists("/public/product_img/$product->product_img")) {
            Storage::delete("/public/product_img/$product->product_img");

        }

        $img_extension = $uploadedFile->extension();
        $img_name = time() . '.' . $img_extension;
        Storage::put("/public/product_img/$img_name", file_get_contents($uploadedFile));
    }


    Product::whereId($id)->update([
        'product_name' => $request->product_name,
        'product_desc' => $request->product_desc,
        'product_price' => $request->product_price,
        'product_img' => $img_name,
        'category_id' => $request->category_id
    ]);
    return redirect()->route('products.index');
}
}
