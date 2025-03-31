@extends('layout')

@section('title', 'Tasks by Category')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">💾 Tasks by Category</h1>

        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
                @if($category->task->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h2 class="text-xl font-semibold mb-4 p-2 bg-pink-100 rounded-lg">
                            {{ $category->category_name }}
                            <span class="text-sm font-normal">({{ $category->task->count() }} tasks)</span>
                        </h2>

                        <div class="space-y-3">
                            @foreach($category->task as $task)
                                <div class="border rounded-lg p-3 hover:bg-gray-50 transition">
                                    <div class="flex justify-between items-start">
                                        <a href="{{route('tasks.show',$task->id)}}" class="font-medium">{{ $task->title }}</a>
                                        <div class="flex space-x-2">
                                            @if(!$task->completed)
                                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="text-gray-400 hover:text-green-500 cursor-pointer"
                                                            title="Mark as complete">
                                                        ✅
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                               class="text-yellow-500 hover:text-yellow-700"
                                               title="Edit task">
                                                ✏️
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-500 hover:text-red-700 cursor-pointer"
                                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                                        title="Delete task">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($task->description, 50) }}</p>
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
                @endif
            @endforeach
        </div>
    </div>
@endsection
