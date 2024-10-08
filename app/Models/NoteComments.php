<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteComments extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id', 'notes_id', 'body', 'parent_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function replies()
    {
    return $this->hasMany(NoteComments::class, 'parent_id');
    }
}
