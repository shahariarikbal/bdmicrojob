<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $table='deposits';
    protected $guarded = [];

    public function deposit()
    {
        return $this->morphOne(Notification::class, 'notifiable');
    }
}
