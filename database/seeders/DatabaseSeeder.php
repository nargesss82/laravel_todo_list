<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ایجاد 5 کاربر
        $users = User::factory()->count(5)->create();

        // ایجاد 3 دسته‌بندی
        $categories = Category::factory()->count(3)->create();

        // برای هر کاربر، 5 تا  تسک ایجاد کنید
        $users->each(function ($user) use ($categories) {
            Task::factory()
                ->count(5)
                ->create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                ]);
        });

        // برای هر دسته‌بندی حداقل 2 تسک داشته باشد
        $categories->each(function ($category) {
            if ($category->task()->count() < 2) {
                Task::factory()
                    ->count(2 - $category->task()->count())
                    ->create([
                        'category_id' => $category->id,
                        'user_id' => User::inRandomOrder()->first()->id,
                    ]);
            }
        });
    }
}
