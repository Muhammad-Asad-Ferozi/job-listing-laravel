<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public function jobListing()
    {
        return $this->hasMany(JobListing::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
