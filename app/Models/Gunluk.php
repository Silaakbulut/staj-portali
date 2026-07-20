<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunluk extends Model
{
    use HasFactory;
    protected $fillable=[
    'baslik',
    'aciklama',
    'sorun',
    'cozum',
    'tarih'
];


public function user()
{
    return $this->belongsTo(User::class);
}
protected $table = 'gunlukler';//Bu model gunlukler tablosunu kullanacak
}
