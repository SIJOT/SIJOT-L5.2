<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Start_date, The start date off the rental.
 * @property mixed End_date,   The end data off the rental.
 * @property mixed Status,     The status code off the rental.
 * @property mixed Email,      The contact address from the group or person.
 * @property mixed Group,      The group or person name.
 * @property mixed telephone   The contact telephone number.
 */
class Rental extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Start_date', 'End_date', 'Status', 'Group', 'Email', 'telephone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
