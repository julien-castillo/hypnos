<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable= [
        'image',
        'suite_id',
    ];

    /**
     * Get the suites that owns the image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function suites() {
        return $this->belongsTo(Suite::class);
    }
}
