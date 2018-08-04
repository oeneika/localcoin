<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * Primary Key
     */
    protected $primaryKey = 'id_bank_account';

    /**
     * Table
     */
    protected $table = 'bank_account';

    /**
     * No timestamp
     */
    public $timestamps = false;
}
