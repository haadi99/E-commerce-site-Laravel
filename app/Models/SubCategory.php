<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected static $subCategory, $image, $imageName, $imageExtension, $directory, $imageUrl;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory ='images/upload/category/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }


    public static function createSubCategory($request){
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->status = $request->status;
        self::$subCategory->save();

    }


    public static function updateSubCategory($request, $id){
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image')){
            if(file_exists(self::$subCategory->image)){
                unlink(self::$subCategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl= self::$subCategory->image;
        }
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }


    public static function deleteSubCategory($id){
        self::$subCategory = SubCategory::find($id);
        if(file_exists(self::$subCategory->image)){
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
