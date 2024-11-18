<?php

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/job/{id}', function ($id) {

    $job = Job::findorfail($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
