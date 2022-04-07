<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
    use HasFactory;

    protected $fillable = ["name", "city", "address", "description", "user_id", "image_path"];


    /**
     * Get the user who owns the hotel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the suites.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suites() {
        return $this->hasMany(Suite::class);
    }

}
