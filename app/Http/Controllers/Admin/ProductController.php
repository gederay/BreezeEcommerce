<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' =>  Product::all()
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

            $product->create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $tmp_file->folder . '/' . $tmp_file->file_name
            ]);

            Storage::deleteDirectory('products/tmp/' . $tmp_file->folder);
            $tmp_file->delete();

            return to_route('admin.products.index');
        }

        return back();


        // $temporaryFile = TemporaryFile::where('folder', $request->image);
        // if ($temporaryFile) {
        //     $product->addMedia(storage_path('app/public/products/temp/' . $request->image . '/' . $temporaryFile->file_name))
        //         ->toMediaCollection('image');

        //     rmdir(storage_path('app/public/products/temp' . $request->image));
        //     $temporaryFile->delete();
        // }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
