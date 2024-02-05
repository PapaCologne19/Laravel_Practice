<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ListOfTraining;
use App\Http\Requests\ListOfTrainingRequest;

class ListOfTrainingController extends Controller
{
    public function show_list_of_training()
    {
        return Inertia::render('Training/ListOfTraining/index', [
            'lists' => fn() => ListOfTraining::all()
        ]);
    }

    public function add_list_of_training()
    {
        return Inertia::render('Training/ListOfTraining/create');
    }

    public function store_list_of_training(ListOfTrainingRequest $request)
    {
        ListOfTraining::create([
            'training_title' => $request->input('training_title'),
            'datetime' => $request->input('datetime'),
            'venue' => $request->input('venue'),
            'facilitator' => $request->input('facilitator'),
            'division' => $request->input('division'),
        ]);
        return redirect(route('list-of-training'))->with('success', 'Training Added Successfully');
    }

    public function edit_list_of_training(ListOfTraining $list_of_training)
    {
        return Inertia::render("Training/ListOfTraining/edit", [
            'list_of_training' => $list_of_training,
        ]);
    }

    public function update_list_of_training(ListOfTrainingRequest $request, ListOfTraining $list_of_training)
    {
        $list_of_training->update([
            'training_title' => $request->input('training_title'),
            'datetime' => $request->input('datetime'),
            'venue' => $request->input('venue'),
            'facilitator' => $request->input('facilitator'),
            'division' => $request->input('division'),
        ]);
        return redirect(route('list-of-training'))->with('success', 'Training Update Successfully');
    }

    public function delete_list_of_training(ListOfTraining $list_of_training)
    {
        $list_of_training->delete();
        return redirect(route('list-of-training'))->with('success', 'Training Deleted Successfully');
    }
}
