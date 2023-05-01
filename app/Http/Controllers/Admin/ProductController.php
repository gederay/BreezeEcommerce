<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' =>  Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if ($tmp_file) {
            Storage::copy('products/tmp/' . $tmp_file->folder . '/' . $tmp_file->file_name, 'products/' . $tmp_file->folder . '/' . $tmp_file->file_name);

            $slug = Str::slug($request->title);
            $product->create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $tmp_file->folder . '/' . $tmp_file->file_name
            ]);

            Storage::deleteDirectory('products/tmp/' . $tmp_file->folder);
            $tmp_file->delete();

            return to_route('admin.products.index');
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $image = $product->image;

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->image);
            $image = $request->file('image')->store('products', 'public');
        }

        $slug = Str::slug($request->title);

        $product->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image
        ]);

        return to_route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.products.index');
    }
}
