@extends('layout')
@section('title', 'User Details')
@section('content')
    <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
        <!-- هدر صفحه -->
        <div class="border-b pb-4 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
            <div class="flex items-center mt-2 space-x-4">
                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                    ID: {{ $user->id }}
                </span>
                <span class="px-2 py-1 bg-pink-100 text-pink-800 rounded-full text-sm">
                    {{ $user->email }}
                </span>
            </div>
        </div>

        <!-- بخش اطلاعات کاربر -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-medium text-gray-700 mb-2">User Information</h3>
                <div class="space-y-2">
                    <p><span class="text-gray-500">Registered:</span> {{ $user->created_at->diffForHumans() }}</p>
                    <p><span class="text-gray-500">Last Updated:</span> {{ $user->updated_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-medium text-gray-700 mb-2">Security</h3>
                <p class="text-sm text-gray-500">Password is encrypted for security</p>
            </div>
        </div>

        <!-- بخش تسک‌های کاربر -->
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-700 mb-3">Assigned Tasks ({{ $user->task->count() }})</h3>

            @if($user->task->count() > 0)
                <div class="space-y-3">
                    @foreach($user->task as $task)
                        <div class="border rounded-lg p-3 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                       class="font-medium text-pink-600 hover:text-pink-800">
                                        {{ $task->title }}
                                    </a>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $task->completed ? 'Completed' : 'Pending' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-50 p-4 rounded-lg text-center text-gray-500">
                    No tasks assigned to this user
                </div>
            @endif
        </div>

        <!-- دکمه‌های اقدام -->
        <div class="flex justify-end space-x-3 border-t pt-4">
            <a href="{{ route('users.edit', $user->id) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition flex items-center"
                        onclick="return confirm('Are you sure you want to delete this user?')">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                </button>
            </form>
            <a href="{{ route('users.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition flex items-center">
                ↩️
                Back
            </a>
        </div>
    </div>
@endsection
