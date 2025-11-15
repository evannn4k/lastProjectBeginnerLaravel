<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;

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

        return redirect(route("product"))->with("success", "Aata added successfully");
    }
}
