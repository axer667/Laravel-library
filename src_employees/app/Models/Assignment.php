<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'position_id',
        'wage_rate',
    ];

    public function positions() {
        return $this->hasMany(Position::class, 'id', 'position_id');
    }
}
