<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //
    public function fromUser() {
        return $this->belongsTo(User::class, 'from_user_id'); 
    }

    public function toUser() {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }
}
