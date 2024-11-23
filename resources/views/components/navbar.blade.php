<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body class="antialiased font-sans">
     <nav class="p-4 bg-transparent shadow-md">
        <div class="flex items-center justify-between max-w-7xl mx-auto">
            <div class="flex items-center space-x-6">
                <div class="text-3xl font-semibold text-white">Azhar</div>
                <div class="flex space-x-4">
                    <a href="{{ route('taskmanagement.app') }}" class="text-lg text-white hover:text-blue-300">home</a>
                    <a href="{{ route('taskmanagement.tugas') }}" class="text-lg text-white hover:text-blue-300 transition duration-200">Tugas</a>
                    <a href="{{ route('taskmanagement.member')}}" class="text-lg text-white hover:text-blue-300 transition duration-200">Member</a>
                </div>
            </div>
            <div>
                @auth
                    <span class="text-white text-lg">Welcome, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white text-lg hover:text-blue-300 transition duration-200 ml-4">
                            Logout
                        </button>
                    </form>
                @else
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="flex items-center space-x-2 text-white hover:text-blue-300 transition duration-200">
                        <i class="fas fa-user text-lg"></i>
                        <span>Login/Sign up</span>
                    </button>
                @endauth
            </div>
        </div>
    </nav>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Sign in to our platform
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    @if (session('success'))
                        <div class="text-green-500 text-sm mb-4">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="text-red-500 text-sm mb-4">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="text-red-500 text-sm mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@company.com" required />
                            @error('email')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                            @error('password')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" name="remember"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                                </div>
                                <label for="remember"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                                    me</label>
                            </div>
                            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost
                                Password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Login to your account
                        </button>

                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Not registered? <a href="{{ route('taskmanagement.register') }}"
                                class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="toast-success" class="hidden fixed bottom-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg text-sm">
        Login berhasil! Selamat mengerjakan tugas.
    </div>

    <script>
        @if(session('success'))
            document.getElementById('toast-success').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('toast-success').classList.add('hidden');
            }, 3000);
        @endif

         @if(session('message'))
            alert('{{ session('message') }}');
        @endif
    </script>
</body>

</html>
