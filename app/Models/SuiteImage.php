<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SuiteImage extends Model {

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    protected $fillable = [
        'storage_path',
        'suite_id',
    ];

    /**
     * Get the suite that owns the image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function suite() {
        return $this->belongsTo(Suite::class);
    }

    public function getUrl() {
        if (!empty($this->storage_path) && Storage::disk('public')->exists($this->storage_path)) {
            return Storage::url($this->storage_path);
        }

        return '';
    }

}
