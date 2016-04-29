<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class mailingUsers
 *
 * @category Database_Models
 * @package  SIJOT_Website
 * @author   Tim Joosten <topairy@gmail.com>
 *
 * MySQL Database scheme:
 *
 * @property mixed firstname,  The firstname off the user
 * @property mixed lastname,   The lastname off the user.
 * @property mixes email,      The email address off the user.
 * @property mixed deleted_at, The timestamp when the user is deleted.
 * @property mixed created_at, The timestamp when the user is created.
 * @property mixed updated_at, The timestamp when the user is updated.
 */
class mailingUsers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['deleted_at','created_at', 'updated_at'];

    /**
     * Get all Mailing tags for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag()
    {
        return $this->belongsToMany('App\mailingTags')->withTimestamps();
    }
}
