<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

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

        JobListing::create([
            'title' => request('title'),
            'sal' => request('sal'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = JobListing::find($id);
        return view('jobs.show', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobs = JobListing::find($id);
        return view('jobs.edit', ['jobs' => $jobs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'title' => 'required|min:3',
            'sal' => 'required',
        ]);

        $jobs = JobListing::findOrFail($id);

        $jobs->update([
            'title' => request('title'),
            'sal' => request('sal'),
        ]);

        return redirect('/jobs/'.$jobs->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobs = JobListing::findOrFail($id);

        $jobs->delete();
        return redirect('/jobs');
    }
}
