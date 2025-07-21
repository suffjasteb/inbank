<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = ['user_id', 'type', 'amount', 'to_user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function fromUser() {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser() {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
