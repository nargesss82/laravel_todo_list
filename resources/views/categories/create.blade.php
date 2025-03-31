@extends('layout')

@section('title','Create Category')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-center mb-6">📂Add Category</h1>
            <form id="categoryForm" class="space-y-4" action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="category_name" class="block text-gray-700 mb-2">Category Name</label>
                    @error('category_name')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="text" id="category_name" name="category_name" class="w-full px-4 py-2 border rounded-lg" value="{{old('category_name')}}" required>
                </div>
                <div class="flex space-x-4 mt-6">
                    <button type="submit" class="flex-1 bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-600 transition">
                        Add
                    </button>
                    <a href="{{ route('categories.index') }}"
                       class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
