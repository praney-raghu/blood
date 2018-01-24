<?php

namespace SaveLife;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'blood_group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
