<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'cpf', 'email', 'phone', 'birth_date', 'registered_by'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'owners';
}
