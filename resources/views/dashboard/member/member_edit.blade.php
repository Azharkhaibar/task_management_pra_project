@extends('dashboard.app') <!-- ;ayout utama-->

@section('title', 'Edit Member')

@section('content')
    <h1 class="text-3xl font-semibold mb-8">Edit Member</h1>
    <form action="{{ route('dashboard.member.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="instansi" class="block text-sm font-medium text-gray-700">Instansi</label>
            <input type="text" id="instansi" name="instansi" value="{{ old('instansi', $member->instansi) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $member->email) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-medium rounded-md">
                Update
            </button>
        </div>
    </form>

    <a href="{{ route('dashboard.member') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">
        Back to Member List
    </a>
@endsection
