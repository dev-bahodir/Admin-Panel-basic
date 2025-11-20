<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    public function images() {
        return $this->hasMany(NewsImage::class);
    }

    public function previewImage() {
        return $this->hasOne(NewsImage::class)->where('is_preview', true);
    }
}
