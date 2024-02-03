<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\TrainingRequest;

class TrainingRequestController extends Controller
{
    public function index(){
        // return Inertia::render('Training/TrainingRequest/index', [
        //     'training_request' => TrainingRequest::all()
        // ]);
        return Inertia::render('Training/TrainingRequest/index');

    }
}
