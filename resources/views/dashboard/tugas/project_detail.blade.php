@extends('dashboard.app')

@section('content')
    <div class="container mx-auto p-6 bg-gray-50 rounded-md shadow">
        <div class="flex items-center justify-between mb-6">
            <header>
                <h1 class="text-3xl font-bold text-gray-800">Project Details</h1>
            </header>
            <div>
                <a href="{{ route('dashboard.tugas.tugas') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition">
                    Back
                </a>
            </div>
        </div>

        <section class="space-y-6">
            <div>
                <h2 class="text-lg font-medium text-gray-600">Project Name</h2>
                <p class="text-xl font-semibold text-gray-900">{{ $project->projectname }}</p>
            </div>
            <div>
                <h2 class="text-lg font-medium text-gray-600">Description</h2>
                <p class="text-gray-700">{{ $project->description }}</p>
            </div>
            <div>
                <h2 class="text-lg font-medium text-gray-600">Created At</h2>
                <p class="text-gray-700">{{ \Carbon\Carbon::parse($project->created_at)->format('l, F j, Y') }}</p>
            </div>
        </section>

        @if ($project->tugas && $project->tugas->isNotEmpty())
            <section class="mt-8">
                <h2 class="text-lg font-medium text-gray-600">Related Tasks</h2>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($project->tugas as $task)
                        <div class="p-4 bg-white border rounded-md hover:shadow-lg transition">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $task->taskname }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        @else
            <section class="mt-8">
                <h2 class="text-lg font-medium text-gray-600">Related Tasks</h2>
                <p class="text-gray-500 mt-2">No related tasks available.</p>
            </section>
        @endif
    </div>
@endsection
