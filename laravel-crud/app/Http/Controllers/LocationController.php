<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('location.index', ['locations' => $locations]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'street' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'city' => ['required', 'string'],
            'region' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);
        $newLocation = Location::create($data);
        return redirect(route('location.index'))->with('success', 'Location Added Successfully');

    }

    public function edit(Location $location){
        return view('location.edit', ['location' => $location]);
    }

    public function update(Location $location, Request $request){
        $data = $request->validate([
            'street' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'city' => ['required', 'string'],
            'region' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);
        $location->update($data);
        return redirect(route('location.index'))->with('success', 'Location Updated Successfully');

    }

    public function delete(Location $location){
        $location->delete();
        return redirect(route('location.index'))->with('success', 'Location Deleted Successfully');

    }
}
