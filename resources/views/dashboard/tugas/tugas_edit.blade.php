@extends('dashboard.app')

@section('content')
    <div class="container mx-auto p-6 bg-gray-50 rounded-md shadow">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Project</h1>
        </header>
        <form action="#" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="projectname" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" name="projectname" id="projectname" value="{{ old('projectname', $project->projectname) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 shadow">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
