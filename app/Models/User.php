<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class User extends Model {

    protected $fillable = [
        'oauth',
        'name',
        'email',
        'created_at',
        'updated_at'
    ];

    /**
     * Grab the users maps
     *
     * @return Collection<Map>
     */
    public function maps()
    {
        return $this->hasMany('Map');
    }

}
