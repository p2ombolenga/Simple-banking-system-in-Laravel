<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ttype extends Model
{
    use HasFactory;

    
    public const InitialDepositing = 1;
    public const Depositing = 2;
    public const Withdrawing = 3;
    public const GettingLoan = 4;
    public const PayingLoan = 5;
    public const SendMoney = 6;
    public const ReceiveMoney = 7;

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
