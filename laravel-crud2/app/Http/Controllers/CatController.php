<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::all();
        return view('cat.index', ['cats' => $cats]);
    }

    public function add()
    {
        return view('cat.add');
    }

    public function store(CatRequest $request)
    {
        Cat::create([
            'cat_name' => $request->input('cat_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'breed' => $request->input('breed')
        ]);
        return redirect(route('cat.index'))->with('success', 'Cat Added Successfully');
    }

    public function edit(Cat $cat)
    {
        return view('cat.edit', ['cat' => $cat]);
    }

    public function update(CatRequest $request, Cat $cat)
    {
        $cat->update([
            'cat_name' => $request->input('cat_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'breed' => $request->input('breed')
        ]);
        return redirect(route('cat.index'))->with('success', 'Cat Updated Successfully');
    }

    public function delete($id)
    {
        Cat::destroy($id);
        return redirect(route('cat.index'))->with('success', 'Cat Deleted Successfully');
    }
}
