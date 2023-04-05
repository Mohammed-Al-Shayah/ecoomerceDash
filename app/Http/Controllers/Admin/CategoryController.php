<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use PhpParser\JsonDecoder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->with('perant')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required',
            'parent_id' => 'nullable |exists:categories,id',
        ]);
        //Upload File
        $img_path = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories'), $img_path);

        //convert name to jason
        $name=json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
        ],JSON_UNESCAPED_UNICODE);

            //Insert To Database
        Category::create([
            'name' => $name,
            'image' =>$img_path,
            'parent_id' => $request->parent_id,
        ]);
        //Redirect
        return redirect()->route('admin.category.index')->with('msg', 'Created category successfully')->with('type', 'success');
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
        $categories=Category::all();
        $category=Category::findOrFail($id);
        return view('admin.categories.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::findOrFail($id);

        //validate data
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        //Upload File
        $img_name  =$category->image;
        if($request->hasFile('image')){
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'), $img_name);
        }
        //convert name to jason
        $name=json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
        ],JSON_UNESCAPED_UNICODE);

        //Insert To Database
        $category->update([
            'name' =>  $name,
            'image' =>  $img_name,
            'parent_id' => $request->parent_id,
        ]);
        //Redirect
        return redirect()->route('admin.category.index')->with('msg', ' category updated  successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        File::delete(public_path('uploads/categoris/' . $category->image));
        $category->children()->update(['parent_id' => null]);
        $category->delete();

        return redirect()->route('admin.category.index')->with('msg', 'category deleted successfully')->with('type', 'danger');
    }

}
