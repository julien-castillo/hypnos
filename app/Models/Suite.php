<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suite extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price", "description", "hotel_id", "image_path1", "image_path2", "image_path3", "image_path4"];

    /**
     * Get the hotel that owns the suite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
}
