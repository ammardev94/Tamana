<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * (Optional if Laravel follows naming convention)
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'img',
        'title',
        'description',
        'author_name',
        'author_img',
        'author_youtube',
        'author_facebook',
        'author_linkdin',
    ];
}
