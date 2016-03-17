<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

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
