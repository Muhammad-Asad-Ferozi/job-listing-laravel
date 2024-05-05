<?php

namespace App\Http\Controllers;

use App\Mail\{
    JobDeleted,
    JobPosted,
    JobUpdated
};
use App\Models\JobListing;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobListing::with('employer')->latest()->simplePaginate(4);
        return view('jobs\index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        isset($user->employer) ? $employer = $user->employer : abort(403, 'You are not authorized to create a job listing');
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3',
            'sal' => 'required',
        ]);
        $user = Auth::user();
        
        isset($user->employer) ?
        $job = JobListing::create([
            'title' => request('title'),
            'sal' => request('sal'),
            'employer_id' => $user->employer_id,
        ]) : abort(403, 'You are not authorized to create a job listing');



        Mail::to($job->employer->user->email)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = JobListing::find($id);
        return view('jobs\show', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $job)
    {
         return view('jobs.edit', ['jobs' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobListing $job)
    {
        request()->validate([
            'title' => 'required|min:3',
            'sal' => 'required',
        ]);

        $job->update([
            'title' => request('title'),
            'sal' => request('sal'),
        ]);
        Mail::to($job->employer->user->email)->queue(new JobUpdated($job));
        return redirect('/jobs/'.$job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        Mail::to($job->employer->user->email)->queue(new JobDeleted($job->title));
        $job->delete();
        return redirect('/jobs');
    }

}
