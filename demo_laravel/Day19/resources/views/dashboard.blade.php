<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }} <br> <br>
                    <a href="{{ route('tasks.index') }}" style="color:red">Go to Task List</a>
                </div>

                 <!-- Hiển thị nút chỉ khi người dùng là admin -->
                 @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users') }}" style="padding: 10px; background-color: red; color: white; text-decoration: none;">
                            Quản lý người dùng
                        </a>
                    @endif
            </div>
        </div>
    </div>
</x-app-layout>
