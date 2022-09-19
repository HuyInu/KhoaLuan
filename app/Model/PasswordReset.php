<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = "password_resets";
    protected $fillable = [
        'Email', 
        'token',
    ];
    public $primaryKey = 'Email';
    public $timestamps =  false;

    public function insert($Email,$token)
    {
        $this::updateOrCreate(
            [
                'Email'=>$Email
            ],
            [
                'token'=>$token
            ]
            );
    }

    public function get($email, $token)
    {
        return $this::where([
            'Email' => $email,
            'token' => $token
        ])->first();
    }

    public function deleteToken($email)
    {
        $this::where('Email',$email)->delete();
    }

}
