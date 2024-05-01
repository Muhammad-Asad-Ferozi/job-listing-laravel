<?php

use App\Http\Controllers\JobListingController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



Route::view('/home', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobListingController::class);
















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
