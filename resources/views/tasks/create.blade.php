@extends('layout')

@section('title','Create Task')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-center mb-6">➕ Create Task</h1>
            <form id="taskForm" class="space-y-4" action="{{route('tasks.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 mb-2">Title</label>
                    @error('title')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg" value="{{old('title')}}" required>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 mb-2">Category</label>
                    <select name="category_id" class="w-full px-4 py-2 border rounded-lg ">
                        @foreach($categories as $category)
                            <option  value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    @error('description')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <textarea id="description" name="description" rows="5"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >{{old('description')}}</textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection
