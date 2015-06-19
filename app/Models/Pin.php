<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Pin extends Model {

    protected $fillable = [
        'map_id',
        'comment',
        'friend_name',
        'latitude',
        'longitude'
    ];

    /**
     * Grab the parent map
     *
     * @return Map
     */
    public function map()
    {
        return $this->belongsTo('App\Models\Map');
    }

}
