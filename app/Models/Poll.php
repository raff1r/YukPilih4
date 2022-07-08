<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'polls';
protected $fillable = [
    'title',
    'description',
    'deadline',
    'created_by',
    'deleted_at'
];

public function User()
{
    return $this->beLongsTo(User::class, 'created_by');
}

public function Choices()
{
    return $this->hasMany(Choice::class);
}
    
}
