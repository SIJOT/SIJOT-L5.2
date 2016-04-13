<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App
 *
 * @property mixed, Uri,         the uri segment off the group?.
 * @property mixed, title,       the title off the group description.
 * @property mixed, sub_title,   the sub title off the group description.
 * @property mixed, description, the discription off the group.
 */
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
     * Scope to get the group through the Uri segment.
     *
     * @param  $query
     * @param  string $uri the uri segment.
     * @return mixed
     */
    public function scopeGetGroup($query, $uri)
    {
        return $query->where('Uri', $uri);
    }
}
