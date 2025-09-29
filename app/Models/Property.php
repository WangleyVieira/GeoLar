<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Property extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['road', 'number', 'neighborhood', 'city', 'state', 'zip_code', 'area', 'owner_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'properties';
}
