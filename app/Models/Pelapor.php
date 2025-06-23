<?php

namespace App\Models;

use App\Models\Saran;
use App\Models\Komplain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelapor extends Model
{
    protected $table = 'pelapors';

    protected $fillable = ['nama', 'email', 'whatsapp', 'pekerjaan', 'umur', 'gender', 'is_penumpang'];

    public function komplain(): HasMany
    {
        return $this->hasMany(Komplain::class);
    }

    public function saran(): HasMany
    {
        return $this->hasMany(Saran::class);
    }
}
