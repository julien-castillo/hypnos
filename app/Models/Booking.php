<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ["startDate", "endDate", "suite_id", "user_id"];

    /**
     * Get the suite that owns the booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suite() {
        return $this->hasOne(Suite::class);
    }

    /**
     * Get the booking's user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
