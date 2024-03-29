<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount'
    ];

    public function user(){
        return $this->belongsTo(User::class,'receiver_id');
    }
    

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
