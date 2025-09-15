<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyOwner extends Model
{
    use SoftDeletes;
    protected $fillable = ['property_id', 'owner_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'property_owners';
}
