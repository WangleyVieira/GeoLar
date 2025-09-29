<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class GeographicCoordinate extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['latitude', 'longitude','property_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'geographic_coordinates';
}
