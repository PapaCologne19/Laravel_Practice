<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
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

    public function edit(Cat $cat)
    {
        return view('cat.edit', ['cat' => $cat]);
    }

    public function update(Request $request, Cat $cat)
    {
        $data = $request->validate([
            'cat_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'color' => 'required',
            'breed' => 'required',
        ]);

        $cat->update($data);
        return redirect(route('cat.index'))->with('success', 'Cat Updated Successfully');
    }

    public function delete($id)
    {
        Cat::destroy($id);
        return redirect(route('cat.index'))->with('success', 'Cat Deleted Successfully');
    }
}
