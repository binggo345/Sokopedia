<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transactions(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }
}
