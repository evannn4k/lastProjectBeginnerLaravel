<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
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
        return view("admin.costumer");
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
        return view("admin.category");
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
