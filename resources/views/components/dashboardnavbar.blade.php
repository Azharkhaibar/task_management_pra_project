<div class="w-full bg-slate-800 text-white p-4 flex justify-between items-center">
    <div class="text-2xl font-bold">Dashboard Ku</div>
    <div class="flex items-center space-x-4">
        @auth
            <span class="font-medium text-white">Hello, {{ Auth::user()->name }}</span>
        @endauth

        <form method="POST" action="{{ route('dashboard.logout') }}">
            @csrf
            <button class="bg-slate-600 px-4 py-2 rounded hover:bg-slate-700">Logout</button>
        </form>
    </div>
</div>
