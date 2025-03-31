@extends('layout')
@section('title','ُShow Task')
@section('content')
    <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
        <!-- هدر -->
        <div class="border-b pb-4 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">{{ $task->title }}</h1>
            <div class="flex items-center mt-2">
            <span class="px-3 py-1 rounded-full text-sm
                {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                {{ $task->completed ? '✅ completed' : '🟡 in progress' }}
            </span>
                <span class="ml-2 text-gray-500">Id: {{ $task->id }}</span>
            </div>
        </div>

        <!-- اطلاعات اصلی -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <p class="text-gray-500">Category:</p>
                <p class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full inline-block">
                    {{ $task->category->category_name }}
                </p>
            </div>

        </div>

        <!-- توضیحات -->
        <div class="mb-6">
            <p class="text-gray-500 mb-2">Description:</p>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="whitespace-pre-line">{{ $task->description ?? 'No description entered' }}</p>
            </div>
        </div>

        <!-- ایجادکننده -->
        <div class="flex items-center mb-6">
            <div class="bg-gray-200 rounded-full p-2">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-gray-500 text-sm">Created by:</p>
                <p>{{ $task->user->name }}</p>
            </div>
        </div>

        <!-- دکمه‌های اقدام -->
        <div class="flex justify-end space-x-3 border-t pt-4">
            <a href="{{ route('tasks.edit', $task->id) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                ✏️ Edit
            </a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition"
                        onclick="return confirm('are you sure?')">
                    🗑️ Delete
                </button>
            </form>
            <a href="{{ url()->previous() }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                ↩️ Return
            </a>
        </div>
    </div>
@endsection
