<?php

namespace CorpBinary;

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

    /**
     * Get Bank Accounts of connected user
     */
    public function Bank(){
        return $this->hasOne('CorpBinary\Bank','id_bank','id_bank');
    }
}
