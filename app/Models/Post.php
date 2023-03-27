<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function specificTasks()
    {
        return $this->hasMany(SpecificTask::class);
    }

    public function jobSubmit()
    {
        return $this->hasMany(PostSubmit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
