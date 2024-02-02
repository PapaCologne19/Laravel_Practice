<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ListOfTraining;

class ListOfTrainingController extends Controller
{
    public function show_list_of_training()
    {
        // $lists = ListOfTraining::all();

        return Inertia::render('Training/ListOfTraining/index', [
            'lists' => fn () => ListOfTraining::all()
        ]);
    }
    public function store_list_of_training(Request $request)
    {
        $data = $request->validate([
            'training_title' => 'required',
            'datetime' => 'required',
            'venue' => 'required',
            'facilitator' => 'required',
            'division' => 'required',
        ]);

        ListOfTraining::create($data);
        return redirect(route('list-of-training'))->with('success', 'Training Added Successfully');
    }

    public function edit_list_of_training(ListOfTraining $list){
        return  Inertia::render("Training/ListOfTraining/edit",[
            'list' => $list
        ]);
    }
}
