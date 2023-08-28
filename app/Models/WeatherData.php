<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;
    protected $table = 'weather_data';
    protected $fillable = ['id', 'city_id', 'temperature', 'description', 'created_at', 'updated_at'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
