<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'assigned_to', 'title', 'due_date','description', 'priority', 'status', 'category'
    ];

    public function comments()
    {
    return $this->hasMany(TaskComment::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
