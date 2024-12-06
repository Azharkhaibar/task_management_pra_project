@extends('dashboard.app')

@section('title', 'Member Page')

@section('content')
    <h1 class="text-3xl font-semibold mb-8">Member</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-2">Total Members</h2>
            <p class="text-gray-700 text-3xl font-bold">{{ $totalmember }}</p>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-7">
        <h2 class="text-xl font-semibold mb-4">Daftar Member</h2>

        <div class="hidden md:block">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 text-left">#</th>
                        <th class="border border-gray-300 p-2 text-left">Name</th>
                        <th class="border border-gray-300 p-2 text-left">Instansi</th>
                        <th class="border border-gray-300 p-2 text-left">Email</th>
                        <th class="border border-gray-300 p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchmember as $index => $member)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $member->name }}</td>
                            <td class="border border-gray-300 p-2">{{ $member->instansi }}</td>
                            <td class="border border-gray-300 p-2">{{ $member->email }}</td>
                            <td class="border border-gray-300 p-2 flex space-x-2 items-center">
                                <a href="{{ route('dashboard.member.edit', $member->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded">Edit</a>

                                <a href="{{ route('dashboard.member.show', $member->id) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white text-sm px-3 py-1 rounded">Detail</a>

                                <form action="{{ route('dashboard.member.destroy', $member->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="block md:hidden space-y-4">
            @foreach ($fetchmember as $index => $member)
                <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-700">#{{ $index + 1 }} {{ $member->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $member->instansi }}</p>
                    </div>
                    <p class="text-sm text-gray-600 mt-2"><strong>Email:</strong> {{ $member->email }}</p>
                    <div class="flex mt-4 space-x-2">
                        <a href="{{ route('dashboard.member.edit', $member->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded">Edit</a>
                        <a href="{{ route('dashboard.member.show', $member->id) }}"
                            class="bg-green-500 hover:bg-green-700 text-white text-sm px-3 py-1 rounded">Detail</a>
                        <form action="{{ route('dashboard.member.destroy', $member->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
