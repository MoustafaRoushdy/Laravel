<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image'
    ];

    // public function myUserRelation()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected function setImageAttribute($value) {
         if ($value) 
         { 
             $path = $value->store('images/uploads', ['disk' => 'posts-Avatar']); 
             return $this->attributes['image'] = $path;
         } 
    } 
}
