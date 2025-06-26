<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomplainHistory extends Model
{
     protected $fillable = [
        'komplain_id', 
        'user_id', 
        'status', 
        'tingkatan', 
        'catatan_perubahan', 
        'riwayat'
    ];

     protected $table = 'komplains_histories';

    public function komplain()
    {
        return $this->belongsTo(Komplain::class);
    }

    public function changer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
