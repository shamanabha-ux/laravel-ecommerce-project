<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
         $query = Product::query();

    // SEARCH
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // PAGINATION (6 products per page)
    $products = $query->latest()->paginate(2);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = null;

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            //$request->image->move(public_path('products'), $imageName);
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->route('products.index')->with('success', 'Product added');
    }

    /**
     * Display the specified resource.
     */
  
public function show(Product $product)
{
    return view('products.show', compact('product'));
}
    /**
     * Show the form for editing the specified resource.
     */
   
  public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->all();

    if ($request->hasFile('image')) {

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);
       // $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Deleted');
    }
}
