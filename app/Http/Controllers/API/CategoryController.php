<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::orderBy('id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required',
        ]);
        return Category::create([
            'categoryName'=>$request->categoryName,
            'iconImage'=>$request->iconImage,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required',
        ]);

        $category->categoryName = $request->categoryName;
        $category->iconImage = $request->iconImage;
        $category->save();
    }

    /* Category Image upload functionality */

    public function categoryImage(Request $request){
        $request->validate([
            'file'=>'required|mimes:jpeg,png,jpg,bmp,webp,gif',
        ]);
        $picname =time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('admin/images/category'), $picname);
        return $picname;
    }


    /* Delete Category Image */

    public function deleteCategoryImage(Request $request){
        $filename = $request->imageName;
        $filepath = public_path().$filename;
        if(file_exists($filepath)){
            @unlink($filepath);
        }
        return $filepath;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $filename = $category->imageName;
        $filepath = public_path().'/admin/images/category/'.$filename;
        if(file_exists($filepath)){
            @unlink($filepath);
        }
        return $filepath;
    }
}
