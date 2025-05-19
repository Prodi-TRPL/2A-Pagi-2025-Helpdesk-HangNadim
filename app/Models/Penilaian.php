<?php

namespace App\Models;

use App\Models\Komplain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaians';
    protected $fillable = [
        'komplain_id',
        'rating',
        'feedback'
    ];

    protected $casts = [
        'rating' => 'integer'
    ];
    
    public function komplain(): BelongsTo 
    {
        return $this->belongsTo(Komplain::class);
    }
    
    public function getRatingTextAttribute(): string
    {
        return match ($this->rating) {
            1 => 'Sangat Tidak Puas',
            2 => 'Tidak Puas',
            3 => 'Netral',
            4 => 'Puas',
            5 => 'Sangat Puas',
            default => 'Tidak Valid',
        };
    }

    public static function ratingOptions(): array
    {
        return [
            1 => 'Sangat Tidak Puas',
            2 => 'Tidak Puas',
            3 => 'Netral',
            4 => 'Puas',
            5 => 'Sangat Puas',
        ];
    }

}
