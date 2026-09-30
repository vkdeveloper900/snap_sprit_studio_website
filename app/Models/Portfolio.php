<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'client_name',
        'project_date',
        'category',
        'featured_image',
        'gallery_id',
        'tech_stack',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->order)) {
                $model->order = (static::max('order') ?? 0) + 1;
            }
        });
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'portfolio_media')
            ->withPivot('order')
            ->orderBy('portfolio_media.order');
    }
}
