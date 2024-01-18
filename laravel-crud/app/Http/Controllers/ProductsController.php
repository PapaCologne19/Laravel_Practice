<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'product_description' => 'nullable'
        ]);

        $newProduct = Product::create($data);
        return redirect(route('product.index'));

    }

    public function edit(Product $product){
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'product_description' => 'nullable'
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Update Successfully');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
