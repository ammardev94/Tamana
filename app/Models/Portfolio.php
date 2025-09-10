<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    protected $fillable = [
        'thumbnail_img',
        'images',
        'title',
        'location',
        'map',
        'map_url',
        'client',
        'value',
        'consortium',
        'tanama_role',
        'builder',
        'architect',
        'financial_close_date',
        'completion_date',
        'contract_terms',
        'awards',
        'other_information',
    ];

    protected $casts = [
        'images' => 'array',
    ];

}
