<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// TODO: add properties.
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
     * get all Mailing tags for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag()
    {
        return $this->belongsToMany('App\mailingTags')->withTimestamps();
    }
}
