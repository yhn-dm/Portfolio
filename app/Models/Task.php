<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
'user_id',
        'title',
        'description',
        'due_date',
        'start_time',
        'end_time',
        'is_complete',
    ];

    protected $casts = [
        'due_date' => 'date',
        'is_complete' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}