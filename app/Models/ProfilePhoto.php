<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilePhoto extends Model
{
    use SoftDeletes;
    protected $fillable = ['name_original','name_hash', 'user_id', 'registeredByUser', 'inactivatedByUser'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'profile_photos';

    const HAS_PHOTO = true;
    const NOT_PHOTO = false;
}
