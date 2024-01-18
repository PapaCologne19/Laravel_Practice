<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;



class ApplicantController extends Controller
{
    public function index(){
        $applicant = Applicant::all();
        return view('applicant.index', ['applicants' => $applicant]);
    }

    public function create(){
        return view('applicant.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'applicant_name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'email_address' => 'required|email',
            'gender' => 'required',
            'civil_status' => 'required',
        ]);

        $newApplicant = Applicant::create($data);

        activity()
        ->causedBy(auth()->user()) 
        ->performedOn($newApplicant)
        ->withProperties(['action' => 'created']) 
        ->log('Applicant created: ' . $newApplicant->applicant_name);

        return redirect(route('applicant.index'))->with('success', 'Applicant Added Successfully');
    }

    public function edit(Applicant $applicant){
        return view('applicant.edit', ['applicant' => $applicant]);        
    }

    public function update(Applicant $applicant, Request $request){
        $data = $request->validate([
            'applicant_name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'email_address' => 'required|email',
            'gender' => 'required',
            'civil_status' => 'required',
        ]);
        $applicant->update($data);

        activity()
        ->causedBy(auth()->user()) 
        ->performedOn($applicant)
        ->withProperties(['action' => 'created']) 
        ->log('Applicant updated: ' . $applicant->applicant_name);

        return redirect(route('applicant.index'))->with('success', 'Applicant Updated Successfully');
    }

    public function delete(Applicant $applicant){
        $applicant->delete();
        return redirect(route('applicant.index'))->with('success', 'Applicant Deleted Successfully');
    }
}
