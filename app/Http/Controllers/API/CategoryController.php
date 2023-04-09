<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        if($categories->count()>0){
            return response()->json([
                'message'=>'All Category',
                'status'=>'Success',
                'data'=>$categories,
            ],201);
        }else{
            return response()->json([
                'message'=>'No Category',
                'status'=>'Success',
                'data'=>$categories,
            ],404);
        }

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
            $category=Category::create([
            'name' => $name,
            'image' =>$img_path,
            'parent_id' => $request->parent_id,
        ]);


        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data=$request->all();

        //Upload File
        $img_name  =$category->image;
        if($request->hasFile('image')){
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'), $img_name);
            $data['image']=$img_name;
        }
        //convert name to jason
        if($request->has('name_en')){
            $name=json_encode([
                'en'=>$request->name_en,
                'ar'=>$category->name_ar,
            ],JSON_UNESCAPED_UNICODE);
        }

        if($request->has('name_ar')){
            $name=json_encode([
                'en'=>$category->name_en,
                'ar'=>$request->name_ar,
            ],JSON_UNESCAPED_UNICODE);
        }

        if($request->has('name_en')||$request->has('name_ar')){
            $data['name']=$name;
            unset($data['name_en']);
            unset($data['name_ar']);
        }
        //Insert To Database
        $category->update($data);
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
