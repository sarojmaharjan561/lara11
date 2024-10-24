<?php

namespace App\Models;

use Illuminate\Support\Arr;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Job
{
    // use HasFactory;

    public static function all()
    {
        $jobs = [
            [
                'id' => '1',
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => '3',
                'title' => 'Teachers',
                'salary' => '$40,000'
            ]
        ];

        return $jobs;
    }

    public static function find($id)
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (!$job) {
            abort(404);
        }
    }
}
