<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NidVerification extends Model
{
    use HasFactory;
    protected $table='nid_verifications';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function nidVerification()
    {
        return $this->morphOne(Notification::class, 'notifiable');
    }
}
