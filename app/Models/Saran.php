<?php

namespace App\Models;

use App\Models\Pelapor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saran extends Model
{
    protected $table = 'sarans';
    protected $fillable = [
        'pelapor_id',
        'message',
        'bukti'
    ];

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(Pelapor::class);
    }
}
