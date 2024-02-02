<?php

namespace App\Http\Controllers;

use App\Models\Ape;
use Illuminate\Http\Request;
use App\Http\Requests\ApeRequest;

class ApeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apes = Ape::all();
        return view('ape.index', ['apes' => $apes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ape.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApeRequest $request)
    {
        Ape::create([
            'ape_name' => $request->input('ape_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'type' => $request->input('type')
        ]);
        return redirect(route('ape.index'))->with('success', 'Ape Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ape $ape)
    {
        return view('ape.edit', ['ape' => $ape]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApeRequest $request, Ape $ape)
    {
        $ape->update([
            'ape_name' => $request->input('ape_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'type' => $request->input('type')
        ]);
        return redirect(route('ape.index'))->with('success', 'Ape Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ape::destroy($id);
        return redirect(route('ape.index'))->with('success', 'Ape Deleted Successfully');
    }
}
