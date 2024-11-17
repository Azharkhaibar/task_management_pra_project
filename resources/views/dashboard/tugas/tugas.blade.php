@extends('dashboard.app')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-4xl font-semibold">Daftar Project</h1>
    <a href="{{ route('dashboard.tugas.tambah')}}" class="p-2 bg-blue-500 text-white rounded-md">tambah tugas</a>
</div>
<div class=""></div>
@endsection
