@extends('layout')

@section('title', 'Categories List')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">📂 Categories List</h1>
        </div>

        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-12 bg-gray-100 p-4 font-medium text-gray-600">
                <div class="col-span-4">Category</div>
                <div class="col-span-3">Action</div>
            </div>

            @forelse($categories as $category)
                <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transition-colors items-center">
                    <div class="col-span-4 font-medium">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-pink-600 hover:text-pink-800">
                            {{ $category->category_name }}
                        </a>
                    </div>
                    <div class="col-span-3 flex space-x-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-600 hover:text-yellow-800 p-2 rounded hover:bg-yellow-50 ">
                            ✏️
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded hover:bg-red-50 cursor-pointer" onclick="return confirm('Are you sure you want to delete this category?')">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">
                    No categories found
                </div>
            @endforelse
        </div>
    </div>
@endsection
