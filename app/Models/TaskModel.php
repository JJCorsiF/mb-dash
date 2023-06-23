<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskModel extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'status'];

    public function assignee(): BelongsTo {
        return $this->belongsTo(User::class, 'assignee_id', 'id'); //->withDefault();
    }
}
