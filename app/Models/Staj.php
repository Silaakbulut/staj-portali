<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staj extends Model
{

    protected $fillable = [
        'user_id',
        'baslangic_tarihi',
        'bitis_tarihi'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}