<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['number'];

    /**
     * @return BelongsTo
     */
    public function seasons(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
