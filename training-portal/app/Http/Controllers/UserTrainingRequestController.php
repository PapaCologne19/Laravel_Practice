<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Mail\MailNotification;
use App\Models\ListOfTraining;
use App\Models\TrainingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TrainingRequests;

class UserTrainingRequestController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Main/index', [
            'lists' => fn() => ListOfTraining::all(),
        ]);
    }

    public function create(ListOfTraining $add)
    {
        return Inertia::render('User/Main/create', [
            'add' => $add,
        ]);
    }

    public function store(TrainingRequests $request)
    {
        $user = Auth::user();
        $specificTrainingTitle = $request->input('training_title');

        if ($user->trainingRequests()->where('training_title', $specificTrainingTitle)->exists()) {
            return redirect(route('show_user_training_list'))->with('error', 'You already have a pending training request.');
        }

        $trainingRequest = new TrainingRequest([
            'training_title' => $request->input('training_title'),
            'datetime' => $request->input('datetime'),
            'venue' => $request->input('venue'),
            'facilitator' => $request->input('facilitator'),
            'division' => $request->input('division'),
        ]);

        $user->trainingRequests()->save($trainingRequest);

        // Send email to the specified recipient
        $recipientEmail = $user->email;
        $recipientName = $user->firstname;
        $training_title = $request->input('training_title');
        Mail::to($recipientEmail)->send(new MailNotification($recipientName, $training_title));

        return redirect(route('show_user_training_list'))->with('success', 'Training Added Successfully');
    }
}
