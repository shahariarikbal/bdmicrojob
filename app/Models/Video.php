<?php

namespace App\Models;

use App\Models\UserVideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function user_videos(){
    	return $this->hasMany(UserVideo::class, 'video_id');
    }
}
