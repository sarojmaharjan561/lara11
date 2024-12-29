<x-layouts>
    <x-slot:heading>Job Listings</x-slot:heading>
    <div class="space-y-4">
        @foreach($jobs as $job)
        <div class="mt-4 bg-red-400">
            <div>
                {{$job->employer->name}}
            </div>
            <div>

                <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
                    <strong>{{$job['title']}}:</strong> Pays {{$job['salary']}} per year.
                </a>
            </div>
        </div>
        @endforeach
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layouts>