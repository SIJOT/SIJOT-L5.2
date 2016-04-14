<?php

namespace App;

use Fenos\Notifynder\Notifable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * @property mixed id,       The record id in the database. (auto-increment)
 * @property mixed name,     The name from the user.
 * @property mixed gsm,      The gsm number from the user.
 * @property mixed email,    The email address from the user.
 * @property mixed password, The password from the user.
 */
class User extends Authenticatable
{
    use HasRolesAndAbilities, Notifable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
