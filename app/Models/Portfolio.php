<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'section_one_title',
        'section_one_paragraph',
        'section_one_button_text',
        'section_one_button_file',
        'section_four_title',
        'section_four_paragraph',
        'section_four_button_text',
        'section_four_button_link',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
