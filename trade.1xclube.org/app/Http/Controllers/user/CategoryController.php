<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public $route = 'admin.category';
    public function index()
    {
        $category = PackageCategory::get();
        return view('admin.pages.category.index', compact('category'));
    }
    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = PackageCategory::find($id);
        }
        return view('admin.pages.category.insert', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
        ]);
        if ($request->id){
            $model = PackageCategory::findOrFail($request->id);
        }else{
            $model = new PackageCategory();
        }
        $model->name = $request->name;
        $model->save();
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'Category Updated Successful.' : 'Category Created Successful.');
    }

    public function delete($id)
    {
        $model = PackageCategory::find($id);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
