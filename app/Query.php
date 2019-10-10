<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = "queries";

    protected $fillable = [
        "humidity", "city_id"
    ];

    public function city()
    {
        return $this->belongsTo(City::class,"city_id");
    }
}
