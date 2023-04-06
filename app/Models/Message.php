<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
      'theme',
      'text',
      'file_path',
      'user_id',
    ];

    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeSorted(Builder $query, Request $request)
    {
        $query->when($request->sortBy, function (Builder $q) use ($request) {
            $q->orderBy('created_at', $request->sortBy);
        });

    }

    public function getFileUrlAttribute()
    {
        return url(Storage::url($this->file_path));
    }
}
