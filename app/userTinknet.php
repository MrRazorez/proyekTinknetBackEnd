<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTinknet extends Model
{
    use HasFactory;

    protected $table = "user_tinknet";
    protected $fillable = [
        "username",
        "password"
    ];

    protected $hidden = [];
}
