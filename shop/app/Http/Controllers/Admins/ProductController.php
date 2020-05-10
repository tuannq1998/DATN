<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::oldest('id')->paginate(10);
        $viewData = [
            'products' => $products
        ];
        return view('admins.product.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admins.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sale' => $request->sale,
            'description' => $request->description,
            'contents' => $request->contents,
            'title_seo' => $request->title_seo ? $request->title_seo : $request->name,
            'desc_seo' => $request->desc_seo ? $request->desc_seo : $request->name,
        ]);
        return redirect()->back();

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admins.product.update', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sale' => $request->sale,
            'description' => $request->description,
            'contents' => $request->contents,
            'title_seo' => $request->title_seo ? $request->title_seo : $request->name,
            'desc_seo' => $request->desc_seo ? $request->desc_seo : $request->name,
        ]);

        return redirect()->back();
    }

    public function destroy($action, $id)
    {
        if ($action) {
            $product = Product::findOrFail($id);
            switch ($action) {
                case 'delete':
                    $product->delete();
                    break;
            }
        }
        return redirect()->back();
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->hot = !$product->hot;
        $product->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->active = !$product->active;
        $product->save();
        return redirect()->back();
    }
}
