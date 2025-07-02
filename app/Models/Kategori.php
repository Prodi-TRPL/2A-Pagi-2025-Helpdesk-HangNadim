<?php

namespace App\Models;

use App\Models\Komplain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori', 'slug'];

    public function komplain(): HasMany
    {
        return $this->hasMany(Komplain::class);
    }
}
