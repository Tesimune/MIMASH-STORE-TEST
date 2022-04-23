<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {

        return Inertia::render('Product/Index', [
            'products' => Product::all(),
        ]);
    }

    public function show(Product $product)
    {

    }
}
