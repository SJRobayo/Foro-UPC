<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        <!-- Aside Menu -->
        <aside
            class="w-64 bg-white dark:bg-gray-800 shadow min-h-screen relative {{ session('sidebar_closed') ? 'hidden' : '' }}"
            id="sidebar">
            <button onclick="toggleSidebar()" id="toggleButton"
                class="absolute top-2 right-2 px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded">
                <!-- Arrow Back Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div >
                @include('layouts.navigation')

            </div>
        </aside>

        <aside
            class="w-16 bg-white dark:bg-gray-800 shadow min-h-screen relative {{ session('sidebar_closed') ? '' : 'hidden' }}"
            id="closedSidebar">
            <button onclick="toggleSidebar()" id="toggleButton"
                class="absolute top-2 right-2 px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded">
                <!-- Arrow Forward Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </aside>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const closedSidebar = document.getElementById('closedSidebar');
        sidebar.classList.toggle('hidden');
        closedSidebar.classList.toggle('hidden');
    }
</script>

<style>

#toggleButton:hover {
    background-color: #e2e8f0; /* Tailwind's gray-200 */
}
</style>

</html>
