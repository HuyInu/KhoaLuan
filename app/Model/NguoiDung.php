<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class NguoiDung extends Authenticatable
{
    use Notifiable;
    protected $table='NguoiDung';
    public $timestamps = false;
}
