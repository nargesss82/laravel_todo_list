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
        // اکانت تستی اصلی برای ورود
        $mainUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Demo User', 'password' => 'password']
        );

        // ایجاد سایر کاربران
        $otherUsers = User::factory()->count(4)->create();
        $allUsers = collect([$mainUser])->concat($otherUsers);

        // ایجاد دسته‌بندی‌ها
        $categories = Category::factory()->count(4)->create();

        // ایجاد تسک برای کاربر اصلی و سایر کاربران
        $allUsers->each(function ($user) use ($categories) {
            Task::factory()
                ->count(3)
                ->create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                ]);
        });
    }
}
