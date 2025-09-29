<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Attachment extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['file_name', 'description', 'owner_id', 'registered_by'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'attachments';
}
