<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable=[
        'title',
        'user_id',
        'category_id',
        'description',
        'completed'
    ];

    use HasFactory;
    public static function newFactory(): TaskFactory
    {
        return  TaskFactory::new();
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
