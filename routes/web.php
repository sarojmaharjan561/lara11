<?php

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {

    return view('jobs.create');
});

// Store
Route::post('/job', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('jobs');
});

// Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::findorfail($id);

    return view('jobs.show', ['job' => $job]);
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::findorfail($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job = Job::findorfail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return view('jobs.show', ['job' => $job]);
});

// Show
Route::delete('/jobs/{id}', function ($id) {

    $job = Job::findorfail($id);

    $job->delete();

    return redirect('jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
