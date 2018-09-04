<?php

namespace CorpBinary;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender', 'role',
        'lastname','passport','idetification','phone','mobile','fax','address',
        'country','city','state','birthday','user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get Bank Accounts of connected user
     */
    public function BankAccounts(){
        return $this->hasMany('CorpBinary\BankAccount','id_user');
    }

    /**
     * Get Wallet of connected user
     */
    public function wallets(){
        return $this->hasMany('CorpBinary\Wallet','id_user');
    }
}
