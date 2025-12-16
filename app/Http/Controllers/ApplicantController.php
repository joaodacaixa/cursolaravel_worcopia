<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\jobApplied;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    public function store(Request $request, Job $job): RedirectResponse{
        
        //check if user has already applied

        $existingapplication=Applicant::where('job_id',$job->id )
                                        ->where('user_id', auth()->id())
                                        ->exists();
        
        if ($existingapplication){
            return redirect()->back()->with('error','User already applied to this job!');
        }
        $validatedData=$request->validate([
            'full_name' =>"required|string",
            'contact_phone' =>"string",
            'contact_email' =>"required|string|email",
            'message' =>"string",
            'location' =>"string",
            'resume' =>"required|file|mimes:pdf|max:2048",

        ]);

        if($request->hasFile('resume')){
            $path=$request->file('resume')->store('resumes','public');
            $validatedData['resume_path']=$path;
        }

        $validatedData['job_id']=$job->id;
        $validatedData['user_id']=auth()->id();
        
        $application = new Applicant($validatedData);
        $application->save();
        mail::to($job->user->email)->send(new jobApplied($application,$job));
        return redirect()->back()->with('success','Application submitted succesfully!');


    }

    public function destroy($id):RedirectResponse
    {

        $applicant=Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->reout('dashboard')->
        with('success','Applicante deleted successfully!!');
    }
}
