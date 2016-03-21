<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Start_date', 'End_date', 'Status', 'Group', 'Email', 'telephone'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
