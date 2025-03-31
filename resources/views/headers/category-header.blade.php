<header class="bg-pink-900 text-white shadow-lg">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">ToDo System</a>
        <nav class="flex gap-4">
            <a href="{{route('categories.index')}}" class="hover:underline">List categories</a>
            <a href="{{route('categories.create')}}" class="hover:underline">Create category</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button  type="submit" class="hover:underline font-medium bg-white text-pink-600 rounded cursor-pointer">Logout</button>
            </form>
        </nav>
    </div>
</header>
