<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>

<body class="antialiased font-sans bg-slate-900">
    @include('components.navbar')

    <div class="h-fit flex flex-col md:flex-row px-4 md:px-14">
        <div class="w-full md:w-1/2 h-fit md:h-screen flex justify-center md:pr-8 mb-6 md:mb-0">
            <div class="w-full md:w-2/3 bg-transparent p-5 mt-10 text-white rounded-md border border-slate-500">
                <h2 class="text-2xl sm:text-3xl md:text-3xl">Total Pelajar:</h2>
                <h2 class="text-3xl sm:text-4xl md:text-5xl">{{ $totalmember }}</h2>

                <hr class="my-5 border-t border-gray-600">

                <h2 class="text-2xl sm:text-3xl md:text-3xl mt-7">Daftar Tugas Tertera:</h2>
                <h2 class="text-3xl sm:text-4xl md:text-5xl">{{ $totalproject }}</h2>
            </div>
        </div>

        <div class="w-full md:w-1/2 h-fit flex justify-center md:pl-8">
            <div class="w-full md:w-3/4 bg-slate-900 p-5 mt-10 text-white rounded-md">
                <form method="GET" action="{{ route('taskmanagement.member') }}" class="mb-4">
                    <input class="px-4 py-2 w-full rounded-md bg-transparent border border-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm md:text-base"
                    type="search" id="search" placeholder="Cari Anggota..." value="{{ request('search') }}" />
                </form>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-2xl sm:text-3xl md:text-4xl">Anggota</th>
                        </tr>
                    </thead>
                    <tbody id="memberTableBody">
                        @foreach ($allmembers as $member)
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-4 text-sm sm:text-lg md:text-2xl">{{ $member->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById("search");
        const memberTableBody = document.getElementById("memberTableBody");

        searchInput.addEventListener("input", function() {
            const filter = searchInput.value.toLowerCase();
            const rows = memberTableBody.getElementsByTagName("tr");

            Array.from(rows).forEach(function(row) {
                const memberName = row.cells[0].textContent.toLowerCase();
                if (memberName.indexOf(filter) > -1) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
