<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getAbstract($max = 50) {
        return substr($this->text, 0, $max) . '...';
    }

        
    // Relations

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'posts_technology');
    }

}