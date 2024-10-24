<x-layouts>
    <x-slot:heading>Job Listings</x-slot:heading>
    <ul>
        @foreach($jobs as $job)
        <li>
            <a href="/job/{{$job['id']}}" class="text-blue-500 hover:underline">
                <strong>{{$job['title']}}:</strong> Pays {{$job['salary']}} per year.
            </a>
        </li>
        @endforeach
    </ul>
</x-layouts>