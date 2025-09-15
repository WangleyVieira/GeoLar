<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;
    protected $fillable = ['file_name', 'description', 'owner_id', 'registered_by'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'attachments';
}
