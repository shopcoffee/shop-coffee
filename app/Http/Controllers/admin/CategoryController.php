<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
//        dd($request->all());
        $c_avatarName = "";
        $c_bannerName = "";
        if ($request->hasFile('c_avatar')) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $c_avatarName = $image['name'];
        }
        if ($request->hasFile('c_banner')) {
            $image = upload_image('c_banner');
            if ($image['code'] == 1)
                $c_bannerName = $image['name'];
        }
        Category::create(['c_name' => $request->c_name,
            'c_slug' => Str::slug($request->c_name),
            'c_avatar' => $c_avatarName,
            'c_banner' => $c_bannerName,
            'c_description' => $request->c_description,
            'c_hot' => $request->c_hot,
            'c_status' => $request->c_status,]);
        return response()->json(['message' => 'Thêm danh mục mới thành công']);
    }

    public function status($id)
    {
        $category = Category::find($id);
        $category->c_status = !$category->c_status;
        $category->save();
        return response()->json(['message' => 'Thay đổi trạng thái thành công', 'status' => $category->c_status]);
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot = !$category->c_hot;
        $category->save();
        return response()->json(['message' => 'Thay đổi trạng thái thành công', 'hot' => $category->c_hot]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $c_avatarName = $category->c_avatar;
        $c_bannerName = $category->c_banner;
        if ($request->hasFile('c_avatar')) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $c_avatarName = $image['name'];
        }
        if ($request->hasFile('c_banner')) {
            $image = upload_image('c_banner');
            if ($image['code'] == 1)
                $c_bannerName = $image['name'];
        }
        $category->update([
            'c_name' => $request->c_name,
            'c_slug' => Str::slug($request->c_name),
            'c_avatar' => $c_avatarName,
            'c_banner' => $c_bannerName,
            'c_description' => $request->c_description,
            'c_hot' => $request->c_hot,
            'c_status' => $request->c_status]);
        return redirect()->route('admin.category.index')->with('success', 'Cập nhật danh mục mới thành công');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['message' => 'Xóa danh mục thành công']);
    }
}
