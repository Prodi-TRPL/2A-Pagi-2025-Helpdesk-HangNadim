<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Komplain;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['nama', 'email', 'whatsapp', 'role'];

    public function komplain():HasMany
    {
        return $this->hasMany(Komplain::class);
    }
}
