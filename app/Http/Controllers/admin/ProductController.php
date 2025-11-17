<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;

class ProductController extends Controller
{
    public function create(ProductCreateRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() ."_". $file->getClientOriginalName();
            $file->storeAs("images/product", $filename);
            $validated["image"] = $filename;
        }
        
        Product::create($validated);
        
        return redirect(route("product"))->with("success", "Successfully added product");
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($id);
        
        if($request->hasFile("image")) {
            $fileDelete = $product->image;
            Storage::delete("images/product/" .$fileDelete);
            
            $file = $request->file("image");
            $filename = time() ."_". $file->getClientOriginalName();
            $file->storeAs("images/product", $filename);
            $validated["image"] = $filename;
        }

        $product->update($validated);
        
        return redirect(route("product"))->with("success", "Successfully changed the product");
    }
    
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        
        $fileDelete = $product->image;
        Storage::delete("images/product/" .$fileDelete);
        
        $product->delete();

        return redirect(route("product"))->with("success", "Successfully deleted product");
    }
}
