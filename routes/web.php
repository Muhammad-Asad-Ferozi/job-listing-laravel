<?php

use App\Http\Controllers\{
    RegisterUserController,
    JobListingController,
    SessionController,
    ManageUserController
};
use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['latestJobs' => JobListing::latest()->take(3)->get()]);
});


Route::view('/contact', 'contact')->middleware('auth');




//JOb listing
//Route::resource('jobs', JobListingController::class);
Route::get('/jobs', [JobListingController::class, 'index'])
    ->middleware('auth');
Route::post('/jobs', [JobListingController::class, 'store'])
    ->middleware('auth');
Route::get('/jobs/create', [JobListingController::class, 'create'])
->middleware(['auth']);

Route::get('/jobs/{job}', [JobListingController::class, 'show'])
    ->middleware('auth');
Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobListingController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobListingController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');






//AUTH

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


//USer management
Route::middleware(['auth'])->group(function () {
Route::get('/user', [ManageUserController::class, 'index']);
Route::patch('/user/changeName', [ManageUserController::class, 'updateName']);
Route::patch('/user/changePassword', [ManageUserController::class, 'updatePassword']);
Route::post('/user/employer', [ManageUserController::class, 'becomeEmployer']);
Route::patch('/user/employer', [ManageUserController::class, 'updateEmployer']);
Route::post('/user/updateImg', [ManageUserController::class, 'updateImg']);
Route::patch('/user/updateImg', [ManageUserController::class, 'updateImg']);

});








// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/jobs', function () {
//     $jobs = JobListing::with('employer')->latest()->cursorPaginate(4);
//     return view('jobs\index', ['jobs' => $jobs]);
// });

// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });

// Route::post('/jobs', function () {

//     request()->validate([
//         'title' => 'required|min:3',
//         'sal' => 'required',
//     ]);

//     JobListing::create([
//         'title' => request('title'),
//         'sal' => request('sal'),
//         'employer_id' => 1,
//     ]);
//     return redirect('/jobs');
// });


// Route::get('/jobs/{id}', function ($id) {

//     $jobs = JobListing::find($id);
//     return view('jobs.show', ['jobs' => $jobs]);
// });



// Route::get('/jobs/{id}/edit', function ($id) {

//     $jobs = JobListing::find($id);
//     return view('jobs.edit', ['jobs' => $jobs]);
// });



// Route::patch('/jobs/{id}', function ($id) {

//     request()->validate([
//         'title' => 'required|min:3',
//         'sal' => 'required',
//     ]);

//     $jobs = JobListing::findOrFail($id);

//     $jobs->update([
//         'title' => request('title'),
//         'sal' => request('sal'),
//     ]);

//     return redirect('/jobs/'.$jobs->id);
// });

// Route::delete('/jobs/{id}', function ($id) {


//     $jobs = JobListing::findOrFail($id);

//     $jobs->delete();
//     return redirect('/jobs');
// });


// Route::get('/contact', function () {
//     return view('contact');
// });
