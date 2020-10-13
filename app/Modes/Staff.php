<?php

namespace App\Modes;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class Staff extends Model
{
    use HasRoles;
    protected $guarded = [];
    protected $guard_name = 'web';
}
