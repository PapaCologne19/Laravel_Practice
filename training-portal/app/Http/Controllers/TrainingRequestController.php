<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\TrainingRequest;
use Illuminate\Support\Facades\DB;
use App\Mail\MailRejectNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailApprovedNotification;

class TrainingRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $trainingRequests = DB::table('users')
            ->join('training_request', 'users.id', '=', 'training_request.user_id')
            ->select('*')
            ->get();
        return Inertia::render('Training/TrainingRequest/index', [
            'requests' => $trainingRequests->all()
        ]);
    }

    public function accept($id)
    {
        $users = DB::table('users')
            ->join('training_request', 'users.id', '=', 'training_request.user_id')
            ->select('users.email', 'users.firstname', 'training_request.training_title')
            ->where('training_request.id', '=', $id)
            ->first();


        if ($users) {
            $recipientEmail = $users->email;
            $recipientName = $users->firstname;
            $training_title = $users->training_title;

            $trainingRequest = TrainingRequest::findOrFail($id);
            $request_status = "Approved";

            $sendMail = Mail::to($recipientEmail)->send(new MailApprovedNotification($recipientName, $training_title));

            if ($sendMail) {
                $trainingRequest->update(['is_approve' => $request_status]);
                return redirect(route('training-request'))->with('success', 'Approved Successfully');
            }
            return abort(500, 'Internal Error');
        }

        return abort(404, 'User not found for the given training request ID');
    }

    public function reject($id)
    {
        $users = DB::table('users')
            ->join('training_request', 'users.id', '=', 'training_request.user_id')
            ->select('users.email', 'users.firstname', 'training_request.training_title')
            ->where('training_request.id', '=', $id)
            ->first();


        if ($users) {
            $recipientEmail = $users->email;
            $recipientName = $users->firstname;
            $training_title = $users->training_title;

            $trainingRequest = TrainingRequest::findOrFail($id);
            $request_status = "Rejected";

            $sendMail = Mail::to($recipientEmail)->send(new MailRejectNotification($recipientName, $training_title));

            if ($sendMail) {
                $trainingRequest->update(['is_approve' => $request_status]);
                return redirect(route('training-request'))->with('success', 'Approved Successfully');
            }
            return abort(500, 'Internal Error');
        }

        return abort(404, 'User not found for the given training request ID');
    }

    public function done($id)
    {
        $trainingRequest = TrainingRequest::findOrFail($id);
        $training_status = "Done";

        $trainingRequest->update(['is_done' => $training_status]);
        
        return redirect(route('training-request'))->with('success', 'Success');
    }
}
