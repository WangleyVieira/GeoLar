<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProfilePhoto extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['name_original','name_hash', 'user_id', 'registered_by_user', 'inactivated_by_user'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'profile_photos';

    const HAS_PHOTO = true;
    const NOT_PHOTO = false;
}
