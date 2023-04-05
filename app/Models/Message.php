<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->hasOne(User::class);
    }
}
