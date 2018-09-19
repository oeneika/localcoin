<?php

namespace CorpBinary;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use CorpBinary\Transaction;

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

    /**
     * Get Rank of connected user
     */
    public function rank(){
        return $this->hasOne('CorpBinary\Rank','id_user','id');
    }

    /**
     * Get created transactions of connected user
     */
    public function createdTransactions(){
        return $this->hasMany('CorpBinary\Transaction','id_submitting_user');
    }

    /**
     * Get created transactions of connected user
     */
    public function madeTransactions(){
        return $this->hasMany('CorpBinary\Transaction','id_receiving_user');
    }
}
