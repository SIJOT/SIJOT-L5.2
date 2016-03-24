<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mailingTags extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['deleted_at','created_at', 'updated_at'];

    /**
     * get all the users off the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\mailingUsers')->withTimestamps();
    }
}
