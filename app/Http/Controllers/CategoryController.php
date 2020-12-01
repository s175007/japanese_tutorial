<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    private $getItemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate($this->getItemPerPage);
        // return $categories;
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Category::$create_rule)->validate();
        
        $category = new Category();
        $category->name = $request->name;
        $icon_path = Storage::disk('public')->put('icons', $request->file('icon'));
        $category->icon = $icon_path;
        // return $category;
        $category->save();

        return Redirect::route('admin.categories.index')->with('success','Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admins.categories.show')->with('category' , $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // return $category;
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('icon')){
            Validator::make($request->all(), Category::$create_rule)->validate();
        }else{
            Validator::make($request->all(), Category::$update_rule)->validate();
        }

        $category = Category::find($id);
        if(!empty($category)){
            //　Lưu tên
            $category->name = $request->name;

            if($request->hasFile('icon')){
                //Xoá ảnh củ
                Storage::disk('public')->delete($category->icon);
                //Lưu ảnh mới
                $icon_path = Storage::disk('public')->put('icons', $request->file('icon'));
                $category->icon = $icon_path;
            }
            // return $category;
            $category->save();

            return Redirect::route('admin.categories.index')->with('success', 'Cập nhật thành công');
        }

        return Redirect::route('admin.categories.index')->with('fail', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!empty($category)){
            $category->delete();
            return Redirect::back()->with('success','Xoá thành công');
        }
        return Redirect::back()->with('fail', 'Xoá thất bại');
    }
}
