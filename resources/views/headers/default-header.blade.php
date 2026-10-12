<header class="bg-pink-900 text-white shadow-lg">
    <div class="container mx-auto p-4 flex flex-wrap justify-between items-center gap-4">
        <div class="flex items-center gap-6">
            <a href="{{ route('welcome') }}" class="text-2xl font-bold flex items-center gap-2">
                <span>📝</span> ToDo System
            </a>
            <nav class="flex gap-2 text-sm font-medium">
                <a href="{{ route('tasks.index') }}" class="px-3 py-1.5 rounded-lg hover:bg-pink-800/60 text-pink-100">Tasks</a>
                <a href="{{ route('categories.index') }}" class="px-3 py-1.5 rounded-lg hover:bg-pink-800/60 text-pink-100">Categories</a>
                <a href="{{ route('users.index') }}" class="px-3 py-1.5 rounded-lg hover:bg-pink-800/60 text-pink-100">Users</a>
            </nav>
        </div>
        <div class="flex items-center gap-3">
            @auth
                <span class="text-xs text-pink-200 hidden md:inline">👤 {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-medium bg-white text-pink-800 hover:bg-pink-100 px-3 py-1.5 rounded-lg transition cursor-pointer">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium bg-white text-pink-800 hover:bg-pink-100 px-3 py-1.5 rounded-lg transition">Login</a>
                <a href="{{ route('users.create') }}" class="text-sm font-medium bg-pink-700 hover:bg-pink-600 text-white px-3 py-1.5 rounded-lg transition">Register</a>
            @endauth
        </div>
    </div>
</header>
