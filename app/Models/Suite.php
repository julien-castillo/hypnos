<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suite extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price", "description", "hotel_id"];

    /**
     * Get the hotel that owns the suite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
}