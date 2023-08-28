<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];


    public function weatherData()
    {
        return $this->hasMany(WeatherData::class);
    }
}
