<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::get();
        $products = Product::paginate(5);

        $products->withPath("/admin/products");
        return view("products.index", [
            "products" => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::get();
        return view("products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            "name" => ["required", "max:255", "string"],
            "description" => ["required", "string"],
            "price" => ["decimal:0"],
            "is_active" => ["sometimes"],
            "slug" => ["nullable", "max:255", "string"],
            "image" => ["nullable", "mimes:png,jpg,jpeg,svg"],
            "category_id" => ["required"],
        ]);

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "assets/images/products/";
            $file->move($path, $filename);
        }

        $category_id = $request->category_id;

        if (strlen($category_id) > 1) {
            $category_id = 0;
        }

        if (isset($path)) {
            Product::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "is_active" => $request->is_active == true ? 1 : 0,
                "slug" => $request->slug,
                "image" => $path . $filename,
                "category_id" => $category_id,
            ]);
        } else {
            Product::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "is_active" => $request->is_active == true ? 1 : 0,
                "slug" => $request->slug,
                "category_id" => $category_id,
            ]);
        }

        return redirect("products/create")->with("status", "Product created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        
        dd($request->session()->all());

        $product = Product::findOrFail($id);
        $category = Category::find($product->category_id);
        $category_name = $category->name;
        return view('products.show', compact('product', 'category_name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view("products/edit", [
            "product" => $product,
            "id" => $id,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        request()->validate([
            "name" => ["required", "max:255", "string"],
            "description" => ["required", "string"],
            "price" => ["decimal:2"],
            "is_active" => ["sometimes"],
            "slug" => ["nullable", "max:255", "string"],
            "image" => ["nullable", "mimes:png,jpg,jpeg"],
            "category_id" => ["required"],
        ]);


        $product = Product::findOrFail($id);

        $imagefile = $product->image;

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "assets/images/products/";
            
            if (File::exists($product->image)) {
                File::delete($product->image);
            }
            
            $file->move($path, $filename);
            $imagefile = $path . $filename;
        }

        $category_id = $request->category_id;

        if (strlen($category_id) > 1) {
            $category_id = 0;
        }


        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "is_active" => $request->is_active == "on" ? 1 : 0,
            "slug" => $request->slug,
            "image" => $imagefile,
            "category_id" => $category_id,
        ]);

        return redirect()->back()->with("status", "Product update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with("staus", "Product was delete");
    }
}
