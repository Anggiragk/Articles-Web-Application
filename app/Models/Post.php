<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Author;

class Post extends Model
{
    use HasFactory, Sluggable;

    /**
 * The attributes that aren't mass assignable.
 *
 * @var array
 */
protected $guarded = ['id'];
    

    /**
     * Scope a query to only include popular users.
     */
    public function scopeFilter(Builder $query, array $filter): void
    {
        // dd($filter);

        //search by keyword
        $query->when($filter['search'] ?? false, fn ($query, $search) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%'))
            //search by keyword in category
            ->when($filter['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category)))
            //search by keyword in author
            ->when($filter['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
            $query->where('username', $author)));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
