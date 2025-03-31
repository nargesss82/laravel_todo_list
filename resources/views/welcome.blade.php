@extends('layout')

@section('title', 'Todo App - Manage Your Tasks')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-pink-50 to-pink-100 flex flex-col items-center p-4">
        <!-- هدر اصلی - مرکز چین شده -->
        <div class="text-center mb-12 mt-12 max-w-2xl mx-auto">
            <h1 class="text-5xl font-bold text-pink-600 mb-4">Todo App</h1>
            <p class="text-xl text-gray-600">
                Organize your life, boost your productivity. Manage all your tasks in one simple place.
            </p>
        </div>

        <!-- تصویر - مرکز چین شده -->
        <div class="mb-12 max-w-md mx-auto">
            <img src="https://illustrations.popsy.co/amber/task-list.svg" alt="Todo List Illustration" class="w-full h-auto">
        </div>

        <!-- دکمه‌ها - مرکز چین شده -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full max-w-xs sm:max-w-md mx-auto mb-16">
            <a href="{{ route('users.create') }}"
               class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center w-full sm:w-auto">
                Register
            </a>
            <a href="{{ route('login') }}"
               class="bg-white hover:bg-gray-100 text-pink-600 font-bold py-3 px-6 rounded-lg border border-pink-200 shadow-sm hover:shadow-md transition duration-300 text-center w-full sm:w-auto">
                Login
            </a>
        </div>

        <!-- ویژگی‌ها - مرکز چین شده -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto mb-10">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                <div class="text-pink-500 mb-4 mx-auto flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Task Management</h3>
                <p class="text-gray-600">Easily create, organize and prioritize your daily tasks.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                <div class="text-pink-500 mb-4 mx-auto flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Secure</h3>
                <p class="text-gray-600">Your data is protected with industry-standard security.</p>
            </div>
        </div>
    </div>
@endsection
