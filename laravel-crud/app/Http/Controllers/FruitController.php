<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index(){
        $fruits = Fruit::all();
        return view('fruit.index', ['fruits' => $fruits]);
    }

    public function create(){
        return view('fruit.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'fruit_name' => 'required',
            'color' => 'required',
            'taste' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        Fruit::create($data);
        return redirect(route('fruit.index'))->with('success', 'Fruit Successfully Added');
    }

    public function edit(Fruit $fruit){
        return view('fruit.edit', ['fruit' => $fruit]);
    }

    public function update(Request $request, Fruit $fruit){
        $data = $request->validate([
            'fruit_name' => 'required',
            'color' => 'required',
            'taste' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $fruit->update($data);
        return redirect(route('fruit.index'))->with('success', 'Fruit Successfully Updated');
    }

    public function delete(Fruit $fruit){
        $fruit->delete();
        return redirect(route('fruit.index'))->with('success', 'Fruit Successfully Deleted');
    }
}
