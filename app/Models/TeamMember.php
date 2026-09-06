<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'designation',
        'bio',
        'email',
        'phone',
        'avatar',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'portfolio_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
