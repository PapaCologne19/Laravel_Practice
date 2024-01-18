<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(){
        $cats = Cat::all();
        return view('cat.index', ['cats' => $cats]);
    }

    public function create(){
        return view('cat.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'cat_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'color' => 'required',
            'breed' => 'required',
        ]);

        Cat::create($data);
        return redirect(route('cat.index'))->with('success', 'Cat Added Successfully');
    }
}
