<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Owner extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['name', 'cpf', 'email', 'phone', 'birth_date', 'registered_by'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'owners';
}
