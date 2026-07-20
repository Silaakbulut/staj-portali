<?php

namespace App\Models;
use App\Models\User;

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
    return $this->belongsTo(User::class);//Gunluk modelinin her bir kaydı bir kullanıcıya aittir. Bu ilişkiyi tanımlar.
}
protected $table = 'gunlukler';//Bu model gunlukler tablosunu kullanacak
}
