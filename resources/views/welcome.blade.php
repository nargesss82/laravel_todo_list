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

        <!-- بنر مصور ویژگی‌ها - برداری و اختصاصی -->
        <div class="mb-12 max-w-md w-full mx-auto bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-xl border border-pink-100 flex flex-col items-center">
            <div class="w-full bg-pink-50 rounded-xl p-5 border border-pink-100/60 shadow-inner">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-pink-200/50">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-red-400"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                        <span class="w-3 h-3 rounded-full bg-green-400"></span>
                        <span class="text-xs font-semibold text-pink-700 ml-2">Today's Focus</span>
                    </div>
                    <span class="text-xs font-medium bg-pink-200 text-pink-800 px-2 py-0.5 rounded-full">3 Tasks</span>
                </div>
                <div class="space-y-2.5">
                    <div class="flex items-center justify-between bg-white p-3 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-center space-x-3">
                            <span class="w-5 h-5 rounded-md bg-green-100 text-green-600 flex items-center justify-center text-xs">✓</span>
                            <span class="text-sm font-medium text-gray-700 line-through text-gray-400">Design RESTful API routes</span>
                        </div>
                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded">Done</span>
                    </div>
                    <div class="flex items-center justify-between bg-white p-3 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-center space-x-3">
                            <span class="w-5 h-5 rounded-md bg-pink-100 text-pink-600 flex items-center justify-center text-xs">●</span>
                            <span class="text-sm font-medium text-gray-800">Implement Eloquent Relationships</span>
                        </div>
                        <span class="text-[10px] bg-pink-100 text-pink-700 px-2 py-0.5 rounded font-medium">In Progress</span>
                    </div>
                    <div class="flex items-center justify-between bg-white p-3 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex items-center space-x-3">
                            <span class="w-5 h-5 rounded-md bg-gray-100 text-gray-400 flex items-center justify-center text-xs">○</span>
                            <span class="text-sm font-medium text-gray-600">Publish Project on LinkedIn</span>
                        </div>
                        <span class="text-[10px] bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded">Next</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- دکمه‌ها - مرکز چین شده -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full max-w-xs sm:max-w-md mx-auto mb-16">
            @auth
                <a href="{{ route('tasks.index') }}"
                   class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center w-full sm:w-auto">
                    Go to Tasks 🚀
                </a>
            @else
                <a href="{{ route('users.create') }}"
                   class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center w-full sm:w-auto">
                    Register
                </a>
                <a href="{{ route('login') }}"
                   class="bg-white hover:bg-gray-100 text-pink-600 font-bold py-3 px-6 rounded-lg border border-pink-200 shadow-sm hover:shadow-md transition duration-300 text-center w-full sm:w-auto">
                    Login
                </a>
            @endauth
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
