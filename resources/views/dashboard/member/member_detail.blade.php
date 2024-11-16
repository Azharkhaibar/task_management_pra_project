@extends('dashboard.app')

@section('title', 'Detail Member')

@section('content')
<h1 class="text-3xl font-semibold mb-8">Detail Member</h1>
<div class="bg-white shadow-md rounded-lg p-6">
    <p><strong>Name:</strong> {{ $member->name }}</p>
    <p><strong>Instansi:</strong> {{ $member->instansi }}</p>
    <p><strong>Email:</strong> {{ $member->email }}</p>
</div>
@endsection
