<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use App\Http\Requests\DogRequest;

class DogController extends Controller
{
    public function index(){
        $dogs = Dog::all();
        return view('dog.index', ['dogs' => $dogs]);
    }

    public function add(){
        return view('dog.add');
    }

    public function store(DogRequest $request){
        Dog::create([
            'dog_name' => $request->input('dog_name'), 
            'age' => $request->input('age'), 
            'gender' => $request->input('gender'), 
            'color' => $request->input('color'), 
            'breed' => $request->input('breed')
        ]);
        return redirect(route('dog.index'))->with('success', 'Dog Added Successfully');
    }

    public function edit(Dog $dog){
        return view('dog.edit', ['dog' => $dog]);
    }

    public function update(DogRequest $request, Dog $dog){
        $dog->update([
            'dog_name' => $request->input('dog_name'), 
            'age' => $request->input('age'), 
            'gender' => $request->input('gender'), 
            'color' => $request->input('color'), 
            'breed' => $request->input('breed')
        ]);
        return redirect(route('dog.index'))->with('success', 'Dog Updated Successfully');
    }

    public function delete(Dog $dog){
        $dog->delete();
        return redirect(route('dog.index'))->with('success', 'Dog Deleted Successfully');
    }
}
