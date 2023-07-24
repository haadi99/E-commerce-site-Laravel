<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $categories, $category,$subCategory;

    public function index(){
        return view('admin.sub-category.index',[ 'categories' =>Category::whereStatus(1)->get()]);
    }

    public function createSubCategory(Request $request){
        SubCategory::createSubCategory($request);
        return back()->with('message','Category Added Successfully');
    }

    public function manage(){
        $this->subCategory = SubCategory::all();
        return view('admin.sub-category.manage',['subCategories'=>$this->subCategory]);
    }

    public function edit($id){
        $this->subCategory = SubCategory::find($id);
        return view('admin.sub-category.edit' ,['subCategory'=>$this->subCategory, 'categories' =>Category::whereStatus(1)->get()]);
    }

    public function update(Request $request,$id){
        SubCategory::updateSubCategory($request,$id);
        return back()->with('message','Category Updated Successfully');
    }


    public function delete($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/manage')->with('message', 'Category Deleted Successfully');
    }
}
