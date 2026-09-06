<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'original_name',
        'filename',
        'path',
        'mime_type',
        'size',
        'width',
        'height',
        'alt_text',
        'description',
        'category',
        'uploaded_by',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function portfolios(): BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_media')
            ->withPivot('order')
            ->orderBy('portfolio_media.order');
    }
}
