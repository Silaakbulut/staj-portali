<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogrenci extends Model 
{
    use HasFactory;
    protected $table = 'ogrenciler';//Bu model öğrenciler tablosnu kullanacak

    protected $fillable = [ 
        'ad',
        'soyad',
        'bolum',
        'yas'
    ];
}
