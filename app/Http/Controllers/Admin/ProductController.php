<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return Inertia::render('Admin/Product/Index', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        return inertia('Admin/Product/Create');
    }

    public function store(CreateProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $storagePath = 'public/images';
            $filename = $request->validated('uuid');
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $imagePath = $file->storeAs($storagePath, $filename.'.'.$fileExtension);
            $validated['image'] = str_replace('public', 'storage', $imagePath);
            $validated['user_id'] = $request->user()->id;
            Product::create($validated);
            return redirect()->route('product.index');
        }
    }
}
