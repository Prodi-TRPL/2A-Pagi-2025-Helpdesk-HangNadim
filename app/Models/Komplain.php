<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Pelapor;
use App\Models\Kategori;
use App\Models\Penilaian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komplain extends Model
{
    protected $table = 'komplains';
    protected $fillable = ['pelapor_id', 
    'kategori_id', 
    'user_id', 
    'message', 
    'status', 
    'tingkat', 
    'bukti', 
    'bukti_penyelesaian',
    'deskripsi_penyelesaian',
    'is_penumpang',
    'maskapai',
    'no_penerbangan'
];
    protected $casts = ['tiket' => 'string'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $jam = Carbon::now()->format('is');
            $bulan = now()->format('m');
            $tahun = now()->format('y');
;            if (!$model->tiket){
                $model->tiket = 'TKT-' . random_int(100,999). $jam. '-' . $bulan . $tahun;
            }
        });
    }

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(Pelapor::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user(): BelongsTo
    {   
        return $this->belongsTo(User::class);
    }

    public function penilaian(): HasOne
    {
        return $this->hasOne(Penilaian::class);
    }
}
