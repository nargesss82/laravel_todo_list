@extends('layout')

@section('title','Edit Task')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-center mb-6">✏️ Edit Task #{{ $task->id }}</h1>

            @if(session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 mb-2 font-medium">Title</label>
                    @error('title')
                    <span class="text-red-600 text-sm font-bold">{{ $message }}</span>
                    @enderror
                    <input type="text" id="title" name="title"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-500 @error('title') border-red-500 @enderror"
                           value="{{ old('title', $task->title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 mb-2 font-medium">Category</label>
                    <select name="category_id" id="category"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $task->category_id == $category->id || old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 mb-2 font-medium">Description</label>
                    @error('description')
                    <span class="text-red-600 text-sm font-bold">{{ $message }}</span>
                    @enderror
                    <textarea id="description" name="description" rows="5"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500 @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="flex space-x-3">
                    <button type="submit"
                            class="flex-1 bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg transition">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}"
                       class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
