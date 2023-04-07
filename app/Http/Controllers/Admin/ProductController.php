<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodects=Product::orderByDesc('id')->paginate(10);
        return view('admin.product.index',compact('prodects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=new Product();
        $categories=Category::all();
        return view('admin.product.create', compact('products','categories'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'image'=>'required',
            'salary'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',
        ]);


        $img_path=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/products'),$img_path);

        $name=json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
        ],JSON_UNESCAPED_UNICODE);

        $content=json_encode([
            'en'=>$request->content_en,
            'ar'=>$request->content_ar,
        ],JSON_UNESCAPED_UNICODE);


        $product=Product::Create([
            'name'=>$name,
            'image'=>$img_path,
            'salary'=>$request->salary,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'content'=>$content,

        ]);


        return redirect()->route('admin.product.index')->with('msg', 'Created product successfully')->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('saa');
        $categories=Category::all();
        $product=Product::findOrFail($id);
        return view('admin.product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'image'=>'required',
            'salary'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',
        ]);

        $img_path=$product->image;
        if($request->hasFile('image')){
            $img_path=rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/products'),$img_path);
        }


        $name=json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
        ],JSON_UNESCAPED_UNICODE);

        $content=json_encode([
            'en'=>$request->content_en,
            'ar'=>$request->content_ar,
        ],JSON_UNESCAPED_UNICODE);


        $product->update([
            'name'=>$name,
            'image'=>$img_path,
            'salary'=>$request->salary,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'content'=>$content,

        ]);


        return redirect()->route('admin.product.index')->with('msg', 'Edited product successfully')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodect=Product::findOrFail($id);
        File::delete(public_path('uploads/products/' . $prodect->image));
        $prodect->delete();
        return redirect()->route('admin.product.index')->with('msg','product deleted successfully ')->with('type','danger');
    }
}
