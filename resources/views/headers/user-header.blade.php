<header class="bg-pink-900 text-white shadow-lg">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">ToDo System</a>
        <nav class="flex gap-4">
            <a href="{{route('users.index')}}" class="hover:underline">List Users</a>
            <a href="{{route('users.create')}}" class="hover:underline">Create User</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button  type="submit" class="hover:underline font-medium bg-white text-pink-600 rounded cursor-pointer">Logout</button>
            </form>
        </nav>
    </div>
</header>
