<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'seo';

    protected $fillable = [
        'page_slug',
        'page_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'canonical_url',
        'robots',
        'author',
        'schema_markup',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'page_type',
        'additional_tags',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('page_slug', $slug);
    }

    public static function getBySlug($slug)
    {
        return self::where('page_slug', $slug)->first();
    }

    public static function getOrDefault($slug)
    {
        return self::getBySlug($slug) ?? self::createDefault($slug);
    }

    public static function createDefault($slug)
    {
        return new self([
            'page_slug' => $slug,
            'page_title' => ucfirst(str_replace('-', ' ', $slug)),
            'meta_title' => ucfirst(str_replace('-', ' ', $slug)) . ' - Snap Spirit Studio',
            'meta_description' => 'Snap Spirit Studio - Premium Photography & Cinematography',
            'og_type' => 'website',
            'twitter_card' => 'summary_large_image',
        ]);
    }

    public function getMetaTags()
    {
        $tags = [];

        if ($this->meta_title) {
            $tags[] = '<meta name="title" content="' . htmlspecialchars($this->meta_title) . '">';
        }

        if ($this->meta_description) {
            $tags[] = '<meta name="description" content="' . htmlspecialchars($this->meta_description) . '">';
        }

        if ($this->meta_keywords) {
            $tags[] = '<meta name="keywords" content="' . htmlspecialchars($this->meta_keywords) . '">';
        }

        if ($this->robots) {
            $tags[] = '<meta name="robots" content="' . htmlspecialchars($this->robots) . '">';
        }

        if ($this->author) {
            $tags[] = '<meta name="author" content="' . htmlspecialchars($this->author) . '">';
        }

        return implode("\n    ", $tags);
    }

    public function getOGTags()
    {
        $tags = [];

        if ($this->og_title) {
            $tags[] = '<meta property="og:title" content="' . htmlspecialchars($this->og_title) . '">';
        }

        if ($this->og_description) {
            $tags[] = '<meta property="og:description" content="' . htmlspecialchars($this->og_description) . '">';
        }

        if ($this->og_image) {
            $tags[] = '<meta property="og:image" content="' . htmlspecialchars($this->og_image) . '">';
        }

        if ($this->og_type) {
            $tags[] = '<meta property="og:type" content="' . htmlspecialchars($this->og_type) . '">';
        }

        if ($this->canonical_url) {
            $tags[] = '<link rel="canonical" href="' . htmlspecialchars($this->canonical_url) . '">';
        }

        return implode("\n    ", $tags);
    }

    public function getTwitterTags()
    {
        $tags = [];

        if ($this->twitter_card) {
            $tags[] = '<meta name="twitter:card" content="' . htmlspecialchars($this->twitter_card) . '">';
        }

        if ($this->twitter_title) {
            $tags[] = '<meta name="twitter:title" content="' . htmlspecialchars($this->twitter_title) . '">';
        }

        if ($this->twitter_description) {
            $tags[] = '<meta name="twitter:description" content="' . htmlspecialchars($this->twitter_description) . '">';
        }

        if ($this->twitter_image) {
            $tags[] = '<meta name="twitter:image" content="' . htmlspecialchars($this->twitter_image) . '">';
        }

        return implode("\n    ", $tags);
    }

    public function getAllTags()
    {
        $all = [];

        if ($this->getMetaTags()) {
            $all[] = $this->getMetaTags();
        }

        if ($this->getOGTags()) {
            $all[] = $this->getOGTags();
        }

        if ($this->getTwitterTags()) {
            $all[] = $this->getTwitterTags();
        }

        if ($this->schema_markup) {
            $all[] = '<script type="application/ld+json">' . "\n" . $this->schema_markup . "\n" . '</script>';
        }

        if ($this->additional_tags) {
            $all[] = $this->additional_tags;
        }

        return implode("\n    ", $all);
    }
}
