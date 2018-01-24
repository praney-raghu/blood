<?php

namespace SaveLife;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'district', 'state', 'pincode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
