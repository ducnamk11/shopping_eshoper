<?php

namespace App\Modes;

 use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Notifications\Notifiable;
 use Spatie\Permission\Traits\HasRoles;

 class Staff extends Authenticatable
{

    use HasRoles, Notifiable;
     protected $guard = 'staff';
    protected $fillable = ['name', 'email', 'password', 'email_verfied_at'];
     protected $hidden = [
         'password', 'remember_token',
     ];

}
