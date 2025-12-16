<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidatesWhenResolvedTrait;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;


class BookmarkController extends Controller
{
    public function index(){

        $user = Auth::user();
        
        $bookmarks = $user->bookmarkedJobs()->paginate(2);
        return view('jobs.bookmarked')->with('bookmarks',$bookmarks);
    }

        public function store(Job $job):RedirectResponse{

        $user = Auth::user();

        //check if job is already bookmarked
        if($user->bookmarkedJobs()->where('job_id',$job->id)->exists()){
            return back()->with ('error', 'Job already bookmarked');
        }

        //create new bookmark

        $user->bookmarkedJobs()->attach($job->id);
        return back()->with ('success', 'Job bookmarked succesfully!');
    }


     public function destroy(Job $job):RedirectResponse{

        $user = Auth::user();

        //check if job is already bookmarked
        if(!$user->bookmarkedJobs()->where('job_id',$job->id)->exists()){
            return back()->with ('error', 'Job is not bookmarked');
        }

        //create new bookmark

        $user->bookmarkedJobs()->detach($job->id);
        return back()->with ('success', 'Bookmark removed succesfully!');
    }

}
