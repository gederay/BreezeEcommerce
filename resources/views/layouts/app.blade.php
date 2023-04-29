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

<body class="font-sans antialiased" x-data="{ darkMode: false }" x-init="if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
    <div x-bind:class="{'dark' : darkMode === true}">
        <div class="min-h-screen flex flex-row bg-gray-100 dark:bg-gray-700">

            <div>
                <x-layouts.sidebar />
            </div>

            <div class="w-full">
                <!-- Page Heading -->
                @if (isset($header))
                <header class="bg-white px-10 dark:bg-gray-800 shadow flex justify-between">
                    <div class="py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>

                    <div class="flex items-center">
                        <!-- Dark Mode Button -->
                        <div class="flex justify-center">
                            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                                x-on:click="darkMode = !darkMode"
                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                role="switch" aria-checked="false">
                                <span class="sr-only">Dark mode toggle</span>
                                <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                    class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out">
                                    <span
                                        x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                        </svg>
                                    </span>
                                    <span
                                        x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            </button>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('admin.profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </header>
                @endif


                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
