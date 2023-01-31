<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'accno',
        'balance',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function transfers(){
        return $this->hasMany(Transfer::class);
    }
}
