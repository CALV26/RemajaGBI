<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfActivityPayment extends Model
{
    use HasFactory;

    protected $table = 'self_activity_payments';

    protected $fillable = [
        'member_id',
        'total_amount',
        'payment_proof',
        'payment_status',
        'verified_by',
    ];

    // Relasi ke Member
    public function member() {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke Admin (User)
    public function verifier() {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
