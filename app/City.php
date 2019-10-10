<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    protected $fillable = [
        "name", "latitude", "longitude"
    ];

    public function queries()
    {
        return $this->hasMany(Query::class,"city_id");
    }
}
