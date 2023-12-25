<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WordCategory extends Model
{
    use HasFactory;
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}

