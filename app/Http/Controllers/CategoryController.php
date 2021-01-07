<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //Store Category
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->parent = $request->parent;
        $result = $category->save();
        
        //Another Way (Eloquent Way)
        //$formData = $request->all();
        //$result = Category::create($formData);
        //unique slug created by mutators from model
        
        //Query builder way
        // $name = $request->input('name');
        // $parent = $request->input('parent');
        // $result = Category::insert(['name'=>$name, 'parent'=>$parent]);

        if($result){
            return 'Category Save Success.';
        }else{
            return 'Category Save Failed. Try Again!';
        }

    }


    //select all category
    public function select(){
        $data = Category::all();
        return $data;
    } 


    //update a category
    public function update(Request $request){
        $this->validate($request, [
            'name' => ['required',
                    Rule::unique('categories')->ignore($request->id) ],
            'id' => 'required'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->parent = $request->parent;
        $result = $category->save();

        if($result){
            return 'Category Update Success.';
        }else{
            return 'Category Update Failed. Try Again!';
        }
    }


    //delete category
    public function delete(Request $request){

        $id = $request->id;
        $result = Category::where('id', $id)->delete();

        if($result){
            return 'Category Delete Success.';
        }else{
            return 'Category Delete Failed. Try Again!';
        }
    }
}
