<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $table = 'enquiries';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'subject',
        'message',
        'service_interested',
        'budget',
        'status',
        'priority',
        'assigned_to',
        'notes',
        'ip_address',
        'user_agent',
        'responded_at',
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['new', 'viewed', 'in_progress']);
    }

    public function scopePriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }
}
