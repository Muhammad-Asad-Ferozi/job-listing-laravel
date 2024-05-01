<?php

namespace App\Policies;

use Illuminate\Support\Facades\Log;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobListingPolicy
{
    public function edit(User $user, JobListing $job) : bool
    {
        Log::info("User {$user->id} attempting to edit Job {$job->id}");
        $result = $job->employer->user->is($user);
        Log::info("Authorization result: " . ($result ? 'Allowed' : 'Denied'));
        return $result;
    }

}
