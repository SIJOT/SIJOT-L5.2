<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Uri', 'title', 'sub_title', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @param $query
     * @param string $uri the uri segment.
     * @return mixed
     */
    public function scopeGetGroup($query, $uri)
    {
        return $query->where('Uri', $uri);
    }
}