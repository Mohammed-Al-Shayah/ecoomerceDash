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
        $products=Product::all();
        return view('admin.product.create', compact('products'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
