<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'id',
        'title',
        'banner',
        'status',
        'created_at',
        'updated_at',
    ];
}
