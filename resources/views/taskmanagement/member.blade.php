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
            /* Fallback style */
        </style>
    @endif

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>

<body class="antialiased font-sans bg-slate-900">
    @include('components.navbar')
    <div class="h-fit flex items-center px-14">
        <div class="w-1/2 h-screen ">
            <div class="w-2/3 h-fit bg-transparent m-auto p-5 mt-28 text-white rounded-md border border-slate-500">
                <h2 class="text-3xl">Total Pelajar : </h2>
                <h2 class="text-5xl">{{ $totalmember }}</h2>

                <hr class="my-5 border-t border-gray-600">

                <h2 class=" text-3xl mt-7">daftar tugas tertera :</h2>
                <h2 class="text-5xl">{{ $totalproject }}</h2>
            </div>
        </div>
        <div class="w-1/2 h-screen pr-32">
            <div class="h-fit bg-slate-800 m-auto p-5 mt-28 text-white rounded-md">
                <form method="GET" action="{{ route('taskmanagement.member')}}">
                    <input class="px-4 py-2 w-full mb-4 rounded-md bg-transparent" type="search" id="search"
                    placeholder="Search for members..." value="{{ request('search')}}" />
                </form>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-4xl">Members</th>
                        </tr>
                    </thead>
                    <tbody id="memberTableBody">
                        @foreach ($allmembers as $member)
                            <tr class="border-b border-gray-700 mt-10">
                                <td class="px-4 py-4 text-2xl">{{ $member->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

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

</html>
