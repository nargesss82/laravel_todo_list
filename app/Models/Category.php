<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable=[
        'category_name'
    ];

    use HasFactory;
    public static function newFactory(): CategoryFactory
    {
        return  CategoryFactory::new();
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function task(): HasMany
    {
        return $this->tasks();
    }
}

