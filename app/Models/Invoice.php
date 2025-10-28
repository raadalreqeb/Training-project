<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoice_id';
    protected $guarded = [];

    protected $casts = [
        'issued_date' => 'date',
        'due_date' => 'date',
        'total_amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'discount' => 'decimal:2',
        'final_amount' => 'decimal:2',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'Reservation_ID');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'invoice_id', 'invoice_id');
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Reservations::class,
            'Reservation_ID',
            'user_id',
            'reservation_id',
            'user_id'
        );
    }
}
