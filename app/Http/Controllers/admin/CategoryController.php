<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function create(CategoryCreateRequest $request) 
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect(route("category"))->with("success", "Successfully added product category");
    }
    
    public function update(CategoryUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        
        Category::findOrFail($id)->update($validated);
        
        return redirect(route("category"))->with("success", "Successfully changed product category");
    }
    
    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        
        return redirect(route("category"))->with("success", "Successfully deleted product category");
    }
}
