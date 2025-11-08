<!DOCTYPE html>
<html lang="bn" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Employee Manager')</title>

    {{-- Vite assets (Tailwind/JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Extra page-specific styles --}}
    @stack('styles')
</head>

<body class="min-h-full antialiased text-gray-800">
    <div class="min-h-screen flex flex-col">
        {{-- Top Navigation --}}
        <header class="bg-white/80 backdrop-blur border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <a href="{{ route('employees.index') }}" class="flex items-center gap-2 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 text-indigo-600">
                            <path
                                d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 5a1 1 0 10-2 0v5a1 1 0 00.293.707l3 3a1 1 0 101.414-1.414L13 11.586V7z" />
                        </svg>
                        <span>Employee Manager</span>
                    </a>

                    <nav class="hidden md:flex items-center gap-4">
                        <a href="{{ route('employees.index') }}" class="px-3 py-2 rounded-md hover:bg-gray-100">Employee List</a>
                        <a href="{{ route('employees.create') }}" class="px-3 py-2 rounded-md hover:bg-gray-100">Create Employee</a>
                        {{-- <a href="{{ route('departments.index') }}"
                            class="px-3 py-2 rounded-md hover:bg-gray-100">ডিপার্টমেন্ট</a> --}}
                    </nav>

                    <div class="flex items-center gap-3">
                        @auth
                            <span class="text-sm text-gray-600 hidden sm:inline">{{ auth()->user()->name }}</span>
                            <form method="POST" action="">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Logout
                                </button>
                            </form>
                        @endauth
                        @guest
                            <a href="" class="text-sm text-indigo-600 hover:text-indigo-700">Login</a>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        {{-- Main --}}
        <main class="flex-1">
            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
                {{-- Flash messages --}}
                @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 border border-green-200 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-md bg-red-50 border border-red-200 p-4 text-red-800">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 border border-red-200 p-4">
                        <div class="font-semibold text-red-800 mb-2">ফর্মে কিছু ভুল রয়েছে:</div>
                        <ul class="list-disc list-inside text-red-700 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Page header slot (optional) --}}
                @hasSection('page_header')
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page_header')</h1>
                        @hasSection('page_subtitle')
                            <p class="mt-1 text-gray-600">@yield('page_subtitle')</p>
                        @endif
                    </div>
                @endif

                {{-- Main content --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                    <div class="p-4 sm:p-6">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="mt-auto border-t border-gray-200 bg-white">
            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500 flex items-center justify-between">
                <p>&copy; {{ date('Y') }} Employee Manager. সর্বস্বত্ব সংরক্ষিত।</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-gray-700">শর্তাবলি</a>
                    <a href="#" class="hover:text-gray-700">গোপনীয়তা নীতি</a>
                </div>
            </div>
        </footer>
    </div>

    {{-- Page-specific scripts --}}
    @stack('scripts')
</body>

</html>
