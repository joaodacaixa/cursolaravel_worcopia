<?php

use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GeocodeController;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/jobs/search',[JobController::class, 'search'])->name('jobs.search');


Route::resource('jobs', JobController::class)->middleware([
    'create'  => 'auth',
    'store'   => 'auth',
    'edit'    => 'auth',
    'update'  => 'auth',
    'destroy' => 'auth',
]);

Route::middleware('guest')->group(function(){
    Route::get('/register',[RegisterController::class,'register'])->name('register');
//->middleware('guest');//->middleware('guest');a partir da criacao do grupo middleware('guest') nao ha mais necessidade da indicacao indivual das rotas como 'guest'
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

Route::get('/login',[LoginController::class,'login'])->name('login');
//->middleware('guest');a partir da criacao do grupo middleware('guest') nao ha mais necessidade da indicacao indivual das rotas como 'guest'
Route::post('/login',[LoginController::class,'authenticate'])->name('login.authenticate');

});


Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashBoardController::class,'index'])->name('dashboard')->middleware('auth');
Route::put('/profile',[ProfileController::class,'update'])->name('profile.update')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/bookmarks',[BookmarkController::class,'index'])->name('bookmarks.index');
    Route::post('/bookmarks/{job}',[BookmarkController::class,'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{job}',[BookmarkController::class,'destroy'])->name('bookmarks.destroy');
});

Route::post('/jobs/{job}/apply',[ApplicantController::class,'store'])->name('applicant.store')->middleware('auth');

Route::delete('/applicants/{applicant}',[ApplicantController::class,'destroy'])->name('applicant.destroy')->middleware('auth');

Route::get('/geocode',[GeocodeController::class,'geocode']);

/*Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create']);

Route::get('/jobs/{id}',[JobController::class, 'show']);
//a rota com parametro dinamico deve ser a ultima, pois se no exercicio acima
//invertessemos a ordem e a rota create estivesse abaixo da {id} o resultado
//seria no caso aparecer na tela "showing Job create" -->

Route::post('/jobs',[JobController::class,'store']);


   
    Route::get('/', function () {
    return view('welcome');
    });
    Route::get('/jobs', function(){
    return view('jobs.index',[
        'title' => 'available jobs'
    ]);
    $title='available jobs';
    return view('jobs.index')
    ->with('title',$title);
    $title='available jobs';
    $jobs =[
        'Analista de Dados',
        'Especialista em IA',
        'Desenvolvedor BackEnd',
        'Desenvolvedor FrontEnd',
        'Engenheiro de Software',
    ];
    return view('jobs.index',compact('title','jobs'));
}*/

/*Route::get('/test', function(Request $request){
    return[
        'method' => $request->method(),
        'url' => $request->url(),
        'path' => $request->path(),
        'fullUrl' => $request->fullUrl(),
        'ip' => $request->ip(),
        'userAgent' => $request->userAgent(),
        'header' => $request->header(),

    ];
});

Route::get('/users', function(Request $request){
    //return $request->only(['name', 'age']);
    //return $request->all();
    return response()->json($request->query());

});

Route::get('/pagenotfound', function(){
    return response('page not found',404);
});

Route::get('/retoranhello', function(){
    return response('<h1>hello World</h1>',200)->
    header('Content-Type', 'text/html');
});

Route::get('/retornajson', function(){
    return response()->json(['name'=>'Joao']);
});

Route::get('/download', function(){
    return response()->download(public_path('favicon.ico'));
});

Route::get('/cookie', function(){
    return response()
    ->json(['name'=>'Joao'])
    ->cookie('name','Joao');
});

Route::get('/cookie-read', function(Request $request){
    $cookieValue=$request->cookie(('name'));
    return response()
    ->json(['cookie'=>$cookieValue]);
});



route::get('/post/{id}', function (String $id){
    return 'POST ' .  $id;  
})-> where ('id','[0-9]+') ; //opcoes whereNumber('id') ou whereAlpha('id') ou where ('id','[a-zA-Z]') 

route::get('/post/{id}/comment/{comment}', function (String $id , String $comment){
    return 'POST ' .  $id . ' comment ' . $comment;  
});

Route::post('/submit' , function(){
    return 'submitted';
});

Route::get('/test', function(){
    //direciona para a variavel o nome dado a uma rota
    $url = route('jobs');
    return "<a href ='$url'> Click here </a>";
});

Route::get('/api/users', function(){
    //rtorna json
    return [
        'name' => 'joao',
        'name1' => 'joao luiz',
        'name2' => 'joao agueda',
        'name3' => 'joao mendonca',
        'name4' => 'joao luiz agueda',
        'name5' => 'joao luiz mendonca',
        'name6' => 'joao luiz agueda mendonca',
        'name7' => 'joao lam'
    ];
});*/
