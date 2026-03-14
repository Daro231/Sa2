<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'full_name',
        'email',
        'street_address',
        'street_address2',
        'city',
        'state',
        'zip_code',
        'phone_number',
        'payment_method',
        'notes',
        'subtotal',
        'shipping',
        'tax',
        'total_amount',
        'status',
        'payment_status',
        'paid_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'subtotal' => 'decimal:2',
        'shipping' => 'decimal:2',
        'tax' => 'decimal:2',
        'total_amount' => 'decimal:2'
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_REFUNDED = 'refunded';

    const PAYMENT_PENDING = 'pending';
    const PAYMENT_COMPLETED = 'completed';
    const PAYMENT_FAILED = 'failed';
    const PAYMENT_REFUNDED = 'refunded';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedSubtotalAttribute()
    {
        return '$' . number_format($this->subtotal, 2);
    }

    public function getFormattedShippingAttribute()
    {
        return '$' . number_format($this->shipping, 2);
    }

    public function getFormattedTaxAttribute()
    {
        return '$' . number_format($this->tax, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return '$' . number_format($this->total_amount, 2);
    }

    public function getStatusBadgeAttribute()
    {
        $colors = [
            self::STATUS_PENDING => 'yellow',
            self::STATUS_PROCESSING => 'blue',
            self::STATUS_COMPLETED => 'green',
            self::STATUS_CANCELLED => 'red',
            self::STATUS_REFUNDED => 'purple'
        ];

        $color = $colors[$this->status] ?? 'gray';
        
        return "<span class='px-2 py-1 bg-{$color}-100 text-{$color}-800 rounded-full text-xs'>{$this->status}</span>";
    }

    public function getPaymentStatusBadgeAttribute()
    {
        $colors = [
            self::PAYMENT_PENDING => 'yellow',
            self::PAYMENT_COMPLETED => 'green',
            self::PAYMENT_FAILED => 'red',
            self::PAYMENT_REFUNDED => 'purple'
        ];

        $color = $colors[$this->payment_status] ?? 'gray';
        
        return "<span class='px-2 py-1 bg-{$color}-100 text-{$color}-800 rounded-full text-xs'>{$this->payment_status}</span>";
    }
}