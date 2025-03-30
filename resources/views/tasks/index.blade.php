@extends('layout')

@section('title', 'Tasks by Category')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Tasks by Category</h1>

        @if(session('message'))
            <p class="text-blue-950">{{session('message')}}</p>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-4 p-2 bg-blue-100 rounded-lg">
                        {{ $category->category_name }}
                    </h2>

                    <div class="space-y-3">

                        @foreach($category->task as $task)

                            <div class="border rounded-lg p-3 hover:bg-gray-50 transition">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium">{{ $task->title }}</h3>
                                    <div class="flex space-x-2 ">
                                        @if($task->completed==false)
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    ✅
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                           class="text-yellow-500 hover:text-yellow-700">
                                            ✏️
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                                <div class="flex justify-between items-center mt-2">
                                <span class="text-xs text-gray-500">
                                    {{ $task->created_at->diffForHumans() }}
                                </span>
                                    <span class="text-xs px-2 py-1 rounded
                                    {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $task->completed ? 'Completed' : 'Pending' }}
                                </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
