<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\View\ViewName;

class JobController extends Controller
{
    public function index():View{
        $title='available jobs';
        $jobs =[
        'Analista de Dados',
        'Especialista em IA',
        'Desenvolvedor BackEnd',
        'Desenvolvedor FrontEnd',
        'Engenheiro de Software',
        ];
    return view('jobs.index',compact('title','jobs'));
    }

    public function create():View{
     return view('/jobs.create');   
    }

    public function show(string $id):string{
        return "showing Job $id";
    }

    public function store (Request $request):string{
        $title =$request->input('title');
        $description =$request->input('description');

        return "title: $title --- description: $description";
    }
}
