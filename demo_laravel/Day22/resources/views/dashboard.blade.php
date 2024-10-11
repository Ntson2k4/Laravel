<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trang chủ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @if (session('error'))
                <div style="color: red;">
                {{ session('error') }}
                </div>
            @endif
            <!-- <h1 class="text-center">welcome, user</h2> -->
            <h1 class="text-center">Welcome, user</h2>
            </div>
        </div>
    </div>
</x-app-layout>
