<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Suite extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price", "description", "cover", "hotel_id",];

    /**
     * Get the hotel that owns the suite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the images.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    public function getCoverImageUrl() {

        if (!empty($this->cover) && Storage::disk('public')->exists($this->cover)) {
            return Storage::url($this->cover);
        }
        return '';
    }

}
