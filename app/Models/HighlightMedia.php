<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class HighlightMedia extends Model
{
    protected $table = 'highlight_medias';

    protected $fillable = [
        'highlight_id',
        'type',
        'media_url',
        'thumbnail_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order'     => 'integer',
        'is_active' => 'boolean',
    ];

    protected $appends = ['media_full_url', 'thumbnail_full_url'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->order)) {
                $max = static::where('highlight_id', $model->highlight_id)->max('order') ?? 0;
                $model->order = $max + 1;
            }
        });
    }

    public function highlight(): BelongsTo
    {
        return $this->belongsTo(Highlight::class);
    }

    public function getMediaFullUrlAttribute(): ?string
    {
        return $this->media_url ? Storage::disk('highlights')->url($this->media_url) : null;
    }

    public function getThumbnailFullUrlAttribute(): ?string
    {
        return $this->thumbnail_url ? Storage::disk('highlights')->url($this->thumbnail_url) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('id');
    }
}
