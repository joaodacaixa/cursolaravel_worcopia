<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    // Show all user job listings
    public function index():View{
        $user=Auth::user();
        $jobs=Job::where('user_id', $user->id)->get();
        return view('dashboard.index', compact('user','jobs'));
    }
}
