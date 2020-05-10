<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        $viewData = [
            'categories' => $categories
        ];
        return view('admins.category.index', $viewData);
    }

    public function create()
    {
        return view('admins.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'icon' => $request->icon,
            'title_seo' => $request->title_seo ? $request->title_seo : $request->name,
            'desc_seo' => $request->desc_seo ? $request->desc_seo : $request->name,
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admins.category.update', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
                'name' => $request->name,
                'slug' => \Str::slug($request->name),
                'icon' => $request->icon,
                'title_seo' => $request->title_seo ? $request->title_seo : $request->name,
                'desc_seo' => $request->desc_seo ? $request->desc_seo : $request->name,
            ]);

        return redirect()->back();
    }
    public function destroy($action, $id)
    {
        if($action)
        {
            $category = Category::findOrFail($id);
            switch ($action){
                case 'delete':
                    $category->delete();
                    break;
            }
        }
        return redirect()->back();
    }
//    public function active($id)
//    {
//        $category = Category::find($id);
//        $category->active = ! $category->active;
//        $category->save();
//        return redirect()->back();
//    }
    public function active($id)
    {
        $category = Category::find($id);
        $category->active = ! $category->active;
        $category->save();
        return redirect()->back();
    }
}
