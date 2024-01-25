<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use Illuminate\Http\Request;
use App\Http\Requests\BirdRequest;

class BirdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $birds = Bird::all(); // select all from birds
        return view('bird.index', ['birds' => $birds]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bird.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BirdRequest $request)
    {
        Bird::create([
            'bird_name' => $request->input('bird_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'breed' => $request->input('breed')
        ]);
        return redirect(route('bird.index'))->with('Bird Added Successfully');
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
    public function edit(Bird $bird)
    {
        return view('bird.edit', ['bird' => $bird]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BirdRequest $request, Bird $bird)
    {
        $bird->update([
            'bird_name' => $request->input('bird_name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'color' => $request->input('color'),
            'breed' => $request->input('breed')
        ]);
        return redirect(route('bird.index'))->with('success', 'Bird Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bird::destroy($id);
        return redirect(route('bird.index'))->with('success', 'Bird Deleted Successfully');
    }
}
