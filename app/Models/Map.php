<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Map extends Model {

    protected $fillable = [
        'user_id'
    ];

    /**
     * Grab all of this maps pins
     *
     * @return Collection<Pin>
     */
    public function pins()
    {
        return $this->hasMany('Pin');
    }

}
