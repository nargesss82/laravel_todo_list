@extends('layout')
@section('title', 'Category Details')
@section('content')
    <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
        <!-- هدر صفحه -->
        <div class="border-b pb-4 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">{{ $category->category_name }}</h1>
            <div class="flex items-center mt-2 space-x-4">
                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                    ID: {{ $category->id }}
                </span>
                <span class="px-2 py-1 bg-pink-100 text-pink-800 rounded-full text-sm">
                    {{ $category->task->count() }} tasks
                </span>
            </div>
        </div>



        <!-- بخش تسک‌های این دسته‌بندی -->
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-700 mb-3">Tasks in this category ({{ $category->task->count() }})</h3>

            @if($category->task->count() > 0)
                <div class="space-y-3">
                    @foreach($category->task as $task)
                        <div class="border rounded-lg p-3 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                       class="font-medium text-pink-600 hover:text-pink-800">
                                        {{ $task->title }}
                                    </a>
                                    <p class="text-sm text-gray-500 mt-1">
                                        Assigned to: {{ $task->user->name ?? 'Unassigned' }}
                                    </p>
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
                    No tasks in this category
                </div>
            @endif
        </div>

        <!-- دکمه‌های اقدام -->
        <div class="flex justify-end space-x-3 border-t pt-4">
            <a href="{{ route('categories.edit', $category->id) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition flex items-center">
                ✏️
                Edit
            </a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition flex items-center cursor-pointer"
                        onclick="return confirm('Are you sure you want to delete this category?')">
                    🗑️
                    Delete
                </button>
            </form>
            <a href="{{ route('categories.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition flex items-center">
                ↩️
                Back
            </a>
        </div>
    </div>
@endsection
