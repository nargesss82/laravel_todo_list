<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['create', 'store', 'show', 'index'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource (Register).
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage (Register).
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);

        session()->flash('message', 'Registration successful! Welcome to ToDo System.');
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('tasks.category');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $user->update($data);

        session()->flash('message', 'User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message', 'User deleted successfully');
        return redirect()->route('users.index');
    }
}
