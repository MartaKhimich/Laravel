<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    //указываем имена полей, которые можем менять
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'description',
        'author',
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeStatus(Builder $query): void
    {
        if (request()->has('f')) {
            $query->where('status', request()->query('f', 'draft'));
        }
    }
}
