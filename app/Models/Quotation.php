<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\LogsActivity;
use Carbon\Carbon;

class Quotation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'quotation_number',
        'user_id',
        'session_id',
        'customer_name',
        'first_name',
        'last_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_city',
        'customer_state',
        'customer_postal_code',
        'customer_country',
        'subtotal',
        'original_subtotal',
        'total_discount',
        'shipping_cost',
        'tax_amount',
        'total_amount',
        'status',
        'valid_until',
        'sent_at',
        'viewed_at',
        'responded_at',
        'notes',
        'admin_notes',
        'items_data',
        'created_by_admin_id',
        'admin_viewed_at',
        'viewed_by_admin_id',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'original_subtotal' => 'decimal:2',
        'total_discount' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'valid_until' => 'date',
        'sent_at' => 'datetime',
        'viewed_at' => 'datetime',
        'responded_at' => 'datetime',
        'admin_viewed_at' => 'datetime',
        'items_data' => 'array',
    ];

    /**
     * Boot method to generate quotation number
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quotation) {
            if (empty($quotation->quotation_number)) {
                $quotation->quotation_number = 'QUO-' . date('Y') . '-' . strtoupper(substr(uniqid(), -8));
            }
        });
    }

    /**
     * Get the user who created this quotation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin who created this quotation
     */
    public function createdByAdmin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_admin_id');
    }

    /**
     * Get the admin who last viewed this quotation
     */
    public function viewedByAdmin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'viewed_by_admin_id');
    }

    /**
     * Check if quotation is expired
     */
    public function getIsExpiredAttribute(): bool
    {
        return $this->valid_until < Carbon::today();
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'yellow',
            'sent' => 'blue',
            'accepted' => 'green',
            'rejected' => 'red',
            'expired' => 'gray',
            default => 'gray'
        };
    }

    /**
     * Get formatted status
     */
    public function getFormattedStatusAttribute(): string
    {
        return ucfirst($this->status);
    }

    /**
     * Scope for active quotations (not expired)
     */
    public function scopeActive($query)
    {
        return $query->where('valid_until', '>=', Carbon::today());
    }

    /**
     * Scope for expired quotations
     */
    public function scopeExpired($query)
    {
        return $query->where('valid_until', '<', Carbon::today());
    }

    /**
     * Mark as viewed by admin
     */
    public function markAsViewedByAdmin($adminId)
    {
        $this->update([
            'admin_viewed_at' => now(),
            'viewed_by_admin_id' => $adminId,
        ]);
    }

    /**
     * Get items count
     */
    public function getItemsCountAttribute(): int
    {
        return count($this->items_data ?? []);
    }
}
