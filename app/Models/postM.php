<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postM extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'title',
        'content',
        'date',
        'image',
        'user_id',
    ];
}
