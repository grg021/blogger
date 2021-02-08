<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory, Sluggable;

    const MAX_WORDS = 20;

    protected $fillable = ['title', 'description', 'publication_date', 'user_id'];

    protected $dates = ['publication_date'];

    public function getAuthorAttribute()
    {
        return $this->user->name;
    }

    public function getPublishedDateAttribute()
    {
        return $this->publication_date->format('j F, Y');
    }

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->description, self::MAX_WORDS, ' ...');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Creates multiple posts from API
     * @param  array  $data
     */
    public static function createFromData(array $data)
    {
        foreach ($data['data'] as $post) {
            self::createAsAdmin($post);
        }
    }

    /**
     * Creates a new post as admin
     * @param  array  $post
     * @return null
     */
    public static function createAsAdmin(array $post)
    {
        $admin = User::getSystemAdmin();
        return ($admin) ? $admin->blogs()->create($post) : null;
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
