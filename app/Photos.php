<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photos
 * @package App
 *
 * @property varchar, name, the name off the album
 * @property varchar, url,  the url of the album.
 * @property varchar, path, the path to the image,
 */
class Photos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'path'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
