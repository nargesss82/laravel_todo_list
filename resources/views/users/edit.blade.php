@extends('layout')

@section('title','Edit User')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-center mb-6">✏️ Edit User {{$user->id}}</h1>
            <form action="{{route('users.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Name</label>
                    @error('name')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" value="{{old('name',$user->name)}}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    @error('email')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" value="{{old('email',$user->email)}}" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    @error('password')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" value="{{old('password',$user->password)}}" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                    @error('password_confirmation')
                    <span class="text-red-600 font-bold">{{$message}}</span>
                    @enderror
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg" value="{{old('password',$user->password)}}" required>
                </div>

                <div class="flex space-x-4 mt-6">
                    <button type="submit" class="flex-1 bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-600 transition">
                        Edit
                    </button>
                    <a href="{{ route('users.index') }}"
                       class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
