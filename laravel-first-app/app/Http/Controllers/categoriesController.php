<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    public function creat(){
        $categories = Category::all();
        return view('categories.creat',compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'category_name'=>'required|min:5|max:25',
            'category_img' => 'sometimes|mimes:jpg,jpeg,png,webp,bmp',
        ]);

        $uploadedFile = $request->category_img;

        $img_extension = $uploadedFile->extension();
        $img_name = time() . '.' . $img_extension;

        // Store the file in the public disk
        Storage::put("/public/categories_img/$img_name", file_get_contents($uploadedFile));

        Category::create(['category_name'=>$request->category_name,'category_img' => $request->category_img]);

        return redirect()->route('categories.index');
    }

    public function destroy($id){

        $category = Category::find($id);
        Storage::delete("/public/categories_img/$category->category_img");
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'category_name'=>'required|min:5|max:25',
        'category_img' => 'sometimes|mimes:jpg,jpeg,png,webp,bmp'
    ]);

    $category = Category::find($id);

    $uploadedFile = $request->category_img;
    $img_name = $category->category_img;


    if($uploadedFile !== null){

        if(Storage::exists("/public/categories_img/$category->category_img")) {
            Storage::delete("/public/categories_img/$category->category_img");

        }

        $img_extension = $uploadedFile->extension();
        $img_name = time() . '.' . $img_extension;
        Storage::put("/public/categories_img/$img_name", file_get_contents($uploadedFile));
    }

    $category->update([
        'category_name'=>$request->input('category_name'),
        'category_img' => $img_name
    ]);
    return redirect()->route('categories.index');
}



}
