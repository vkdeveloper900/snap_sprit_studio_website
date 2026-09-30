<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class Highlight extends Model
{
    protected $table = 'highlights';

    protected $fillable = [
        'title',
        'description',
        'tag',
        'type',
        'media_url',
        'thumbnail_url',
        'location',
        'sequence',
        'status',
    ];

    protected $casts = [
        'sequence' => 'integer',
    ];

    protected $appends = ['media_full_url', 'thumbnail_full_url', 'encrypted_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->sequence)) {
                $model->sequence = (static::max('sequence') ?? 0) + 1;
            }
        });
    }

    public function medias(): HasMany
    {
        return $this->hasMany(HighlightMedia::class)->orderBy('order')->orderBy('id');
    }

    public function activeMedias(): HasMany
    {
        return $this->hasMany(HighlightMedia::class)->where('is_active', true)->orderBy('order')->orderBy('id');
    }

    public function getMediaFullUrlAttribute(): ?string
    {
        if (!$this->media_url) {
            return null;
        }

        if (str_starts_with($this->media_url, 'http://') || str_starts_with($this->media_url, 'https://')) {
            return $this->media_url;
        }

        return Storage::disk('highlights')->url($this->media_url);
    }

    public function getIsExternalMediaAttribute(): bool
    {
        return $this->media_url
            && (str_starts_with($this->media_url, 'http://') || str_starts_with($this->media_url, 'https://'));
    }

    public function getThumbnailFullUrlAttribute(): ?string
    {
        return $this->thumbnail_url
            ? Storage::disk('highlights')->url($this->thumbnail_url)
            : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sequence')->orderBy('id');
    }

    public function scopeByTag($query, $tag)
    {
        return $query->where('tag', $tag);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /* ================================================================
     | URL-safe encrypted ID (used in public URLs to hide raw row id)
     |================================================================ */

    public function getEncryptedIdAttribute(): string
    {
        return self::encodeUrlSafe(Crypt::encryptString((string) $this->getKey()));
    }

    public function getRouteKey()
    {
        return $this->encrypted_id;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        try {
            $id = (int) Crypt::decryptString(self::decodeUrlSafe($value));
        } catch (\Throwable $e) {
            return null;
        }
        return $this->where($this->getKeyName(), $id)->first();
    }

    protected static function encodeUrlSafe(string $value): string
    {
        return rtrim(strtr($value, '+/', '-_'), '=');
    }

    protected static function decodeUrlSafe(string $value): string
    {
        $value = strtr($value, '-_', '+/');
        $pad = strlen($value) % 4;
        if ($pad > 0) {
            $value .= str_repeat('=', 4 - $pad);
        }
        return $value;
    }
}
