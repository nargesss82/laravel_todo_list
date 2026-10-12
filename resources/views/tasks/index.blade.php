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
            @forelse($categories as $category)
                @if($category->tasks->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-semibold mb-4 p-2 bg-pink-100 rounded-lg text-pink-900">
                                {{ $category->category_name }}
                                <span class="text-sm font-normal text-pink-700">({{ $category->tasks->count() }} tasks)</span>
                            </h2>

                            <div class="space-y-3">
                                @foreach($category->tasks as $task)
                                    <div class="border rounded-lg p-3 hover:bg-gray-50 transition">
                                        <div class="flex justify-between items-start">
                                            <a href="{{route('tasks.show',$task->id)}}" class="font-medium text-gray-800 hover:text-pink-600">{{ $task->title }}</a>
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
                    </div>
                @endif
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-xl shadow-sm border border-pink-100 p-8">
                    <div class="text-4xl mb-3">📋</div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No categories or tasks found</h3>
                    <p class="text-gray-500 mb-6">Start by creating your first task or category.</p>
                    <a href="{{ route('tasks.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 px-5 rounded-lg transition">
                        + Create Your First Task
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
