<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashboard");
    }
    
    
    public function costumer()
    {
        $costumers = Costumer::all();

        return view("admin.costumer", [
            "costumers" => $costumers
        ]);
    }

    public function admin()
    {
        return view("admin.admin");
    }

    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        
        return view("admin.product", [
            "products" => $products,
            "categories" => $categories
        ]);
    }

    public function category()
    {
        $categories = Category::withCount('products')->orderByDesc("products_count")->get();

        return view("admin.category", [
            "categories" => $categories
        ]);
    }

    public function order()
    {
        return view("admin.order");
    }

    public function history()
    {
        return view("admin.history");
    }

}
