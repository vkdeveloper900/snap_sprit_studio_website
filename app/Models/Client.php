<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'logo',
        'category',
        'order',
        'is_active',
        'url',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute(): string
    {
        return $this->logo
            ? Storage::disk('clients')->url($this->logo)
            : 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&background=random&size=128';
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
