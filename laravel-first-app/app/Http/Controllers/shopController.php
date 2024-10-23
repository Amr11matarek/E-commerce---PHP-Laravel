<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;

class shopController extends Controller
{
    public function index(){
        $products = product::paginate(3);
        return view('auth.shop',compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('product_name', 'LIKE', "%{$search}%")
            ->orWhere('product_desc', 'LIKE', "%{$search}%")
            ->paginate(3);

        return view('auth.shop', compact('products'));
    }
    public function getCategory(){
        $categories = Category::all();
        return view('auth.userCategory',compact('categories'));
    }
    public function getProductsByCategoryProducts($id){
        $products = Category::find($id)->products()->paginate(3);
        return view('auth.shop',compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('auth.show', compact('product'));
    }


}
