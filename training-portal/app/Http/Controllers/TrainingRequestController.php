<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\TrainingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrainingRequestController extends Controller
{
    public function index(){
        $user = Auth::user();
        $trainingRequests = DB::table('users')
        ->join('training_request', 'users.id', '=', 'training_request.user_id')
        ->select('*')
        ->get();
        return Inertia::render('Training/TrainingRequest/index', [
            'requests' => $trainingRequests->all()
        ]);

    }
}
