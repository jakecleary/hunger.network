<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

final class Map extends Model {

    protected $fillable = [
        'user_id',
        'lat',
        'lng',
        'looking_for'
    ];

    /**
     * Grab all of this maps pins
     *
     * @return Collection<Pin>
     */
    public function pins()
    {
        return $this->hasMany('App\Models\Pin');
    }

    /**
     * Grab the user for this map
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
