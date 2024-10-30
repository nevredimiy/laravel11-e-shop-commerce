<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::get();
        return view("categories.index", compact("categories"));
    }

    public function create(): View
    {
        $categories = Category::get();
        return view("categories.create", compact("categories"));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "name" => ["required", "max:255", "string"],
            "description" => ["required", "string"],
            "slug" => ["nullable", "max:255", "string"],
            "image" => ["nullable", "mimes:png,jpg,jpeg"],
            "parent" => ["nullable"],
        ]);

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "assets/images/categories/";
            $file->move($path, $filename);
            // Storage::disk('public')->put($filename, 'Contents');
        }

        if (isset($path)) {
            Category::create([
                "name" => $request->name,
                "description" => $request->description,
                "slug" => $request->slug,
                "image" => $path . $filename,
                "category_parent" =>
                    strlen($request->parent) > 1 ? 0 : $request->parent,
            ]);
        } else {
            Category::create([
                "name" => $request->name,
                "description" => $request->description,
                "slug" => $request->slug,
                "category_parent" =>
                    strlen($request->parent) > 1 ? 0 : $request->parent,
            ]);
        }

        Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
            "image" => isset($path) ? $path . $filename : "",
            "category_parent" =>
                strlen($request->parent) > 1 ? 0 : $request->parent,
        ]);

        return redirect("categories/create")->with(
            "status",
            "Category was added"
        );
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        $categories = Category::get();
        return view("categories/edit", [
            "category" => $category,
            "id" => $id,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => ["required", "max:255", "string"],
            "description" => ["required", "string"],
            "slug" => ["nullable", "max:255", "string"],
            "image" => ["nullable", "mimes:png,jpg,jpeg"],
            "parent" => ["nullable"],
        ]);

        $category = Category::findOrFail($id);

        $imagefile = $category->image;

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "assets/images/categories/";
            $file->move($path, $filename);

            if (File::exists($category->image)) {
                File::delete($category->image);
            }

            $imagefile = $path . $filename;
        }

        $category->update([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
            "image" => $imagefile,
            "category_parent" =>
                strlen($request->parent) > 1 ? 0 : $request->parent,
        ]);
        return redirect()->back()->with("status", "Category was update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with("status", "Category was delete");
    }
}
