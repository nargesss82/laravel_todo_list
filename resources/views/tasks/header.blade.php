<header class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">ToDo System</a>
        <nav class="flex gap-4">
            <a href="{{route('tasks.index')}}" class="hover:underline">List of tasks</a>
            <a href="{{route('tasks.create')}}" class="hover:underline">Create</a>
        </nav>
    </div>
</header>
