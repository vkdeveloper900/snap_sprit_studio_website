<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $table = 'testimonials';

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

    protected $appends = ['avatar_url'];

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar
            ? Storage::disk('testimonials')->url($this->avatar)
            : 'https://ui-avatars.com/api/?name='.urlencode($this->client_name).'&background=random&size=128';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->order)) {
                $maxOrder = static::max('order') ?? 0;
                $model->order = $maxOrder + 1;
            }
        });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
