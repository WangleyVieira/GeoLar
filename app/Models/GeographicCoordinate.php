<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeographicCoordinate extends Model
{
    use SoftDeletes;
    protected $fillable = ['latitude', 'longitude','property_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'geographic_coordinates';
}
