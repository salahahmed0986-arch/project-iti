<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * كل Category لها مجموعة Books
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * إنشاء slug تلقائيًا من اسم الـ Category
     */
    protected static function booted(): void
    {
        static::saving(function (Category $category) {

            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

        });
    }
}