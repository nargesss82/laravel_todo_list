<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
//    public static function middleware()
//    {
//        return [
//            new Middleware('auth',except: ['show','index'])
//        ];
//    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all()->map(function($category) {
            $category->tasks = $category->tasks ?? [];
            return $category;
        });

        return view('tasks.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('tasks.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        Task::create([
           'user_id'=>1,
           ...$request->validated()
        ]);
        session()->flash('message','Task created successfully');
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories=Category::all();
        return view('tasks.edit',compact('task','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        session()->flash('message','Task updated successfully');
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        session()->flash('message','Task deleted successfully');
        return redirect(route('tasks.index'));
    }

    public function complete(Task $task)
    {
        $task->update(['completed'=>true]);
        session()->flash('message','Task completed successfully');
        return redirect(route('tasks.index'));
    }
}
