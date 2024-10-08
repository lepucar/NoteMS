<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'user_id', 'share_id', 'category'
    ];

    public function comments()
    {
    return $this->hasMany(NoteComments::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
