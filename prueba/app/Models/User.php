<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    protected $fillable = [
    	'first_name', 
    	'last_name_p',
    	'last_name_m', 
    	'email', 
    	'password', 
    	'UDG_Code',
        'area', 
    	'CURP'
    ];
    protected $hidden = ['password', 'remember_token'];
}
