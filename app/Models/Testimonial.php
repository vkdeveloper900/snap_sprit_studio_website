<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_email',
        'company_name',
        'designation',
        'testimonial_text',
        'rating',
        'avatar',
        'image',
        'order',
        'is_featured',
        'is_approved',
    ];

    protected $casts = [
        'rating' => 'integer',
        'order' => 'integer',
        'is_featured' => 'boolean',
        'is_approved' => 'boolean',
    ];
}
